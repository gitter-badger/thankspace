<?php namespace Thankspace\Repo;

class OrderRepo extends BaseRepo
{

	public function __construct(\Order $order)
	{
		$this->model = $order;
	}


	/**
	 * Get user available storage on warehouse
	 *
	 * @param  array  $option
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getStorageList(array $option = array())
	{
		$user_id = ( isset($option['user_id']) ? $option['user_id'] : \Auth::user()->id );

		$custom_select = [
			'order.is_returned',
			'payment_1.status as payment_status',
			'order_schedule.status as order_schedule_status',
		];

		return $this->_GetStorages( $custom_select )
			->where('order.user_id', $user_id)
			->paginate(20);
	}


	public function getDeliverySchedule(array $option = array())
	{
		if (!empty($option['page_name']))
		{
			\Paginator::setPageName($option['page_name']);
		}

		$order = \DeliverySchedule::with('order.user', 'order.orderSchedule')
			->join('order_payment', 'order_payment.order_id', '=', 'delivery_schedule.order_id')
			->join('order_schedule', 'order_schedule.order_id', '=', 'delivery_schedule.order_id')
			->select('delivery_schedule.*', 'order_schedule.*', 'order_payment.code');

		if (!empty($option['user_id']))
		{
			$order = $order->where('user_id', $option['user_id']);
		}

		$order = $order->paginate(20);

		return $order;
	}


	/**
	 * User order/transaction history
	 *
	 * @param  array  $option
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function GetInvoiceList(array $option = array())
	{
		$user = \Auth::user();

		$data = \OrderPayment::with([
				'Order' => function( $query ){
					$query->with('User','OrderSchedule','DeliverySchedule', 'ReturnSchedule');
				}
		]);

		if ( $user->type == "user" ){
			$data->whereHas('Order', function($query) use ($user) {
				$query->where('user_id', $user->id);
			});
		} elseif ($user->type == "driver") {
			if (!empty($option['page_name']))
			{
				\Paginator::setPageName($option['page_name']);
			}
			$data->where('status', 2)->orderBy('created_at', 'desc');
		}

		return $data->paginate(20);
	}

	/**
	 * For confirmation payment user and admin
	 *
	 * @param  array  $input
	 * @return mix \Illuminate\Database\Eloquent\Model|false
	 */
	public function confirmPayment(array $input = array())
	{
		$status = ( \Auth::user()->type == 'admin' ? 2 : 1 );
		$confirm = \OrderPayment::whereIn('id', $input['order_payment_id'])->update([ 'status' => $status ]);
		if ( $confirm ) {

			if ( $status == 2 ) {
				$user_ids = $this->_sendConfirmPaymentMail($input['order_payment_id']);
				$userHasCommision = app('UserRepo')->getUserHasCommison($user_ids);
				if (!empty($userHasCommision)) {
					$this->_sendCommisionFirstOrderMail($userHasCommision);
				}
			} else {
				$this->_sendConfirmPaymentMailAdmin($input['order_payment_id']);
			}

			return $confirm;
		} else {
			$this->setErrors('No invoice selected');
			return false;
		}
	}


	public function quantity_box_dropdown()
	{
		$list = array();
		for ($i=1; $i <= 20; $i++) {
			$list[$i] = $i;
		}
		$list[21] = 'saya butuh lebih 20';
		return $list;
	}


	public function quantity_item_dropdown()
	{
		$list = array();
		for ($i=0; $i <= 5; $i++) {
			$list[$i] = $i;
		}
		return $list;
	}


	/**
	 * Save into order
	 * @param  array $input this array require 3 key step : index, schedule, payment
	 * @return boolean
	 */
	public function save($orderData)
	{
		$order = $this->_save_order($orderData['index']);

		$this->_save_orderSchedule($order->id, $orderData['schedule']);

		$orderPayment = $orderData['payment'];

		$orderPayment['box'] = $orderData['index']['quantity_box'];
		$orderPayment['item'] = $orderData['index']['quantity_item'];
		$orderPayment['space_credit_used'] = isset($orderData['space_credit_used'])
							? $orderData['space_credit_used'] : 0;
		if ( $orderData['schedule']['type'] == 'later' ) {
			$orderPayment['used_start'] = $orderData['schedule']['pickup_year'] .'-'.
				$orderData['schedule']['pickup_month'] .'-'. $orderData['schedule']['pickup_day'];
		} else {
			$orderPayment['used_start'] = $orderData['schedule']['delivery_year'] .'-'.
				$orderData['schedule']['delivery_month'] .'-'. $orderData['schedule']['delivery_day'];
		}

		$orderPayment = $this->_save_orderPayment($order->id, $orderPayment);

		if (isset($orderData['space_credit_used'])) {
			\Space::create([
				'user_id'	=> \Auth::user()->id,
				'type'		=> 'debet',
				'nominal'	=> $orderData['space_credit_used'],
				'keterangan'=> 'Credit used for purchases order #'.$orderPayment->code,
			]);
		}

		$this->_sendInvoiceDetailMail($order->id);

		$this->_sendAdminNewOrderMail($order->id);

	}

	protected function _save_order($orderIndex)
	{
		$orderIndex['user_id'] = \Auth::user()->id;

		// handle quantity by user select
		if ($orderIndex['type'] == 'box')
		{
			$orderIndex['quantity'] = ($orderIndex['quantity_box'] >= 21)
				? $orderIndex['quantity_custom']
				: $orderIndex['quantity_box'];
		}

		// if user order with custom item
		// we calculating the quantity total
		else
		{
			$qty_for_box = ($orderIndex['quantity_box'] >= 21)
				? $orderIndex['quantity_custom']
				: $orderIndex['quantity_box'];

			$qty_for_item = $orderIndex['quantity_item'];
			$total_qty = $qty_for_box + $qty_for_item;

			// if user choose order type box, fill quantity with quantity_item field
			$orderIndex['quantity'] = $total_qty;
		}

		// save on to order table
		$order = \Order::create($orderIndex);

		// insert to order stuff by quantity box
		for ($i=0; $i < $orderIndex['quantity_box']; $i++)
		{
			\OrderStuff::create(array(
				'order_id' => $order['id'],
				'type' => 'box'
			));
		}

		// insert to order stuff by quantity custom if needed
		if ($orderIndex['quantity_item'] > 0) {
			for ($i=0; $i < $orderIndex['quantity_item']; $i++)
			{
				\OrderStuff::create(array(
					'order_id' => $order['id'],
					'type' => 'item'
				));
			}
		}

		return $order;
	}


	protected function _save_orderSchedule($order_id, $orderSchedule)
	{
		$input = $orderSchedule;
		$input['order_id'] = $order_id;
		$input['delivery_date'] = $input['delivery_year'] .'-'. $input['delivery_month'] .'-'. $input['delivery_day'];

		if ($input['type'] == 'later')
		{
			$input['pickup_date'] = $input['pickup_year'] .'-'. $input['pickup_month'] .'-'. $input['pickup_day'];
		}

		return \OrderSchedule::create($input);
	}


	protected function _save_orderPayment($order_id, $orderPayment)
	{
		$input = $orderPayment;
		$input += [
			'order_id'	=> $order_id,
			'code'		=> NULL,
			'unique'	=> NULL,
		];
		return \OrderPayment::create($input);
	}


	protected function _sendInvoiceDetailMail($id)
	{
		$order = \Order::with('orderPayment', 'orderSchedule', 'orderStuff', 'user')->find($id);

		$name	= \Auth::user()->fullname;
		$email	= \Auth::user()->email;

		$to = [
			'code'		=>	$order['order_payment']['code'],
			'email'		=>	$email,
			'name'		=>	$name,
		];

		$data = [ 'order'	=>	$order ];

		\Mail::send('emails.order-invoice-detail', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] Detail Order #'.$to['code'].' di ThankSpace');
		});
	}

	protected function _sendAdminNewOrderMail($id)
	{
		$order = \Order::with('orderPayment', 'orderSchedule', 'orderStuff', 'user')->find($id);

		$name	= "ThankSpace Support";
		$email	= "support@thankspace.com";

		$to = [
			'code'		=>	$order['order_payment']['code'],
			'email'		=>	$email,
			'name'		=>	$name,
		];

		$data = [ 'order'	=>	$order ];

		\Mail::send('emails.admin-new-order', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] Horay!!  There is new order created in ThankSpace');
		});
	}


	protected function _sendConfirmPaymentMail(array $id = array())
	{
		$orders = \OrderPayment::with('order.user')->whereIn('id', $id)->get();
		$user_ids = [];
		foreach( $orders as $order )
		{
			$fullname = ucfirst($order['order']['user']['firstname']) .' '. ucfirst($order['order']['user']['lastname']);

			array_push($user_ids,$order['order']['user_id']);

			$to = [
				'code'		=>	$order['code'],
				'email'		=>	$order['order']['user']['email'],
				'fullname'	=>	$fullname,
			];

			$data = [
				'code'		=>	$order['code'],
				'date'		=>	date('d/m/Y', strtotime($order['updated_at'])),
				'user'		=>	$order['order']['user'],
			];

			\Mail::send('emails.confirm-payment-success', $data, function($message) use ($to)
			{
				$message->to($to['email'], $to['fullname'])
						->subject('[ThankSpace] Pembayaran invoice #'.$to['code'].' sudah kami terima');
			});
		}
		return $user_ids;
	}

	protected function _sendConfirmPaymentMailAdmin(array $id = array())
	{
		$orders = \OrderPayment::with('order.user')->whereIn('id', $id)->get();
		foreach( $orders as $order )
		{
			$fullname = ucfirst($order['order']['user']['firstname']) .' '. ucfirst($order['order']['user']['lastname']);

			$to = [
				'code'		=>	$order['order_payment']['code'],
				'email'		=>	'support@thankspace.com',
				'name'		=>	'ThankSpace Support',
			];

			$data = [ 'order' => $order ];

			\Mail::send('emails.confirm-payment-user', $data, function($message) use ($to)
			{
				$message->to($to['email'], $to['name'])
						->subject('[ThankSpace] Konfirmasi pembayaran invoice #'.$to['code']);
			});
		}
	}

	protected function _sendCommisionFirstOrderMail(array $data = array())
	{
		// before send mail, insert data commision
		$commision = [
			'type'	=> 'credit',
			'nominal'	=> \Config::get('thankspace.space_credit.commision'),
			'keterangan' => 'Commision earned for new customer first order',
			'created_at'	=> date('Y-m-d h:i:s'),
			'updated_at'	=> date('Y-m-d h:i:s'),
		];

		$space = [];
		foreach ($data as $d) {
			array_push($space, array_merge(
				array('user_id' => $d->ref_code_user_id),
				$commision
			));
		}

		\Space::insert($space);

		 // send mail
		foreach ( $data as $d ) {
			$fullname = ucfirst($d->ref_code_firstname) .' '. ucfirst($d->ref_code_lastname);

			$to = [
				'email'		=>	$d->ref_code_email,
				'name'		=>	$fullname,
			];

			$data_mail = [
				'name'	=> $fullname,
				'commision'	=> \Config::get('thankspace.space_credit.commision'),
			];

			\Mail::send('emails.commision-first-order', $data_mail, function($message) use ($to)
			{
				$message->to($to['email'], $to['name'])
						->subject('[ThankSpace] Komisi order pertama dari pelanggan baru');
			});
		}
	}

	/**
	 * For order schedule set stored for driver
	 *
	 * @param  array  $input
	 * @return mix \Illuminate\Database\Eloquent\Model|false
	 */
	public function setDeliveryStored(array $input = array())
	{
		$confirm = \OrderSchedule::whereIn('id', $input['order_schedule_id'])->update([ 'status' => 1, 'updated_at' => date('Y-m-d H:i:s') ]);
		if ( $confirm )
		{
			$orderIds = [];
			foreach( $input['order_schedule_id'] as $id )
			{
				$order = \OrderSchedule::find($id);
				$this->_sendDeliveryStoredInfo($order['order_id']);
				array_push($orderIds, $order['order_id']);
			}

			\OrderPayment::whereIn('order_id', $orderIds)->update([ 'used_start' => date('Y-m-d H:i:s') ]);

			return $confirm;
		} else {
			$this->setErrors([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No delivery schedule selected',
					'type'	=> 'error',
				]
			]);
			return false;
		}
	}

	protected function _sendDeliveryStoredInfo($id)
	{
		$order = \Order::with('orderPayment', 'orderSchedule', 'orderStuff', 'user')->find($id);

		$to = [
			'code'		=>	$order['order_payment']['code'],
			'email'		=>	$order['user']['email'],
			'name'		=>	$order['user']['fullname'],
		];

		$data = [ 'order'	=>	$order ];

		\Mail::send('emails.order-stored-by-driver', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] Order #'.$to['code'].' sudah kami tangani');
		});
	}


	/**
	 * Add return schedule to boxes
	 */
	public function createReturnSchedule(array $input)
	{
		$input['user_id'] = ( ! empty($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		$input['status'] = 1;

		$validation = \ReturnSchedule::validate($input, ['stuffs' => 'required|array']);
		if ( $validation->fails() )
		{
			$this->setErrors($validation->messages()->all(':message'));
			return false;
		}

		if ( ! empty($input['city_id']))
		{
			$input['status'] = (\Auth::user()->city_id == $input['city_id'])
				? 1
				: 0 ;
		}
		$returnSchedule = \ReturnSchedule::create($input);

		if ($returnSchedule)
		{
			\OrderStuff::whereIn('id', $input['stuffs'])->update(['return_schedule_id' => $returnSchedule->id]);
		}
		return true;
	}


	/**
	 * Get available & driver return schedule
	 *
	 * @param  array  $option [id, user_id, status, is_paginated]
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getReturnSchedule(array $option = array())
	{
		$schedule = \ReturnSchedule::with('order.orderPayment', 'order.user', 'stuffs');

		if ( isset($option['user_id']) )
		{
			$schedule = $schedule->where('user_id', $option['user_id']);
		} else {
			$schedule = $schedule->where('user_id', '=', '');
		}

		if ( isset($option['status']) )
		{
			$schedule = $schedule->where('status', $option['status']);
		}

		if (! empty($option['id'])) {
			$schedule = $schedule->find($option['id']);
		}
		elseif ( ! empty($option['is_paginated']) )
		{
			$schedule = $schedule->paginate(20);
		} else {
			$schedule = $schedule->get();
		}

		if ( $schedule ) {
			return $schedule;
		} else {
			return false;
		}
	}


	/**
	 * For return schedule set returned for driver
	 *
	 * @param  array  $input
	 * @return mix \Illuminate\Database\Eloquent\Model|false
	 */
	public function setReturnedSet(array $input = array())
	{
		$confirm = \ReturnSchedule::whereIn('id', $input['return_schedule_id'])->update([ 'status' => 2 ]);
		if ( $confirm )
		{
			$schedule = $input['return_schedule_id'];
			for ($i = 0; $i < count($schedule); $i++)
			{
				\OrderStuff::where('return_schedule_id', $schedule[$i])->update([ 'status' => 2 ]);

				$return = \ReturnSchedule::where('id', $schedule[$i])->first();
				$stuff_count = \OrderStuff::where('order_id', $return->order_id)->where('status', 1)->count();

				if ( $stuff_count == 0)
				{
					\Order::where('id', $return->order_id)->update([ 'is_returned' => 1 ]);
				}
			}

			return $confirm;
		} else {
			$this->setErrors([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No return schedule selected',
					'type'	=> 'error',
				]
			]);
			return false;
		}
	}


	/**
	 * Get returned stuff from return schedule
	 *
	 * @param  array  $option
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getReturnedStuffs($id)
	{
		return \ReturnSchedule::with('order.orderPayment', 'order.user', 'stuffs')->find($id);
	}


	/**
	 * User order/gallery
	 *
	 * @param  array  $option
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getOrderGallery(array $option = array())
	{
		$gallery = \OrderGallery::orderBy('id', 'desc');

		if( isset($option['order_id']) )
		{
			$gallery = $gallery->where('order_id', $option['order_id']);
		}

		$gallery = $gallery->paginate(20);

		if ( $gallery ) {
			return $gallery;
		} else {
			return false;
		}
	}

	/**
	 * Get Storage Query, for get available storage in whare house
	 * @param  array  $custom_select
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	protected function _GetStorages(array $custom_select = array())
	{
		$select = [
			'order.user_id',
			'payment_1.order_id',
			'payment_1.code AS invoice_code',
			'payment_1.used_start',
			'payment_2.code AS next_invoice',
			'order_schedule.pickup_date',
			'order_schedule.delivery_date',
			\DB::raw('DATEDIFF(CURDATE(),DATE_ADD(DATE_FORMAT(IF(payment_1.used_start IS NULL,
					IF(order_schedule.pickup_date IS NULL, order_schedule.delivery_date,order_schedule.pickup_date),
					payment_1.used_start),"%Y-%m-%d"),INTERVAL 31 DAY))AS expired_on'),
		];

		$select = array_merge($select, $custom_select);

		$db = \DB::table('order_payment as payment_1')
			->leftJoin('order_payment as payment_2', 'payment_1.code', '=', 'payment_2.payment_reff')
			->join('order_schedule', 'payment_1.order_id', '=', 'order_schedule.order_id')
			->join('order', 'payment_1.order_id', '=', 'order.id')
			->join('order_stuff', 'order.id', '=', 'order_stuff.order_id')
			->where('payment_1.status', 2)
			->where(function($query){
				$query->where('payment_2.status', '!=', '2')
							->orWhereNull('payment_2.status');
			})
			->where('order_schedule.status', 1)
			->where('order.is_returned', 0)
			->select($select)
			->groupBy('payment_1.order_id');

			return $db;
	}

	/**
	 * Get Storage Query, for get available storage in whare house
	 * and create new invoice for almost expired storage period,
	 * send mail and return stuff. this function processed with cron job
	 *
	 * @return array $data
	 */
	public function GetInvoiceAlmostExpired()
	{
		$interval_info 			= [ -7, -3, 0, 1 ];
		$interval_returned 	= 3;

		$orderPayments = $this->_GetStorages()
			->whereNull('order_stuff.return_schedule_id')
			->having('expired_on', '>=', array_shift( $interval_info ))
			->get();

			$data = $this->_getInvoiceInfo($orderPayments);

			foreach ( $data as $d ) {
				$temp = $d;

				if ( in_array( $temp['expired_on'], $interval_info ) ){
					$lunas = false; // langsung lunas
					// cek, apakah sudah punya invoice baru apa tidak. jika tidak, buatkan !
					if( $temp['next_invoice'] == null ) {
						// ambil space credit user_id
						$space_credit = app('UserRepo')->getCustomerSpaceCredit( $temp['user_id'] );
						// ambil total biaya
						$totalBiaya = getTotalFromCountStuff( $temp['stuff'] );
						// ambil input new_invoice_input ( order_payment )
						$newPayment = $temp['new_invoice_input'];

						if ( $space_credit != 0) {
							if ( $space_credit >= $totalBiaya ) {
								$newPayment += [
									'space_credit_used' => $totalBiaya,
									'status' => '2'
								];
								$lunas = true;
							} else {
								$newPayment += [
									'space_credit_used'	=> $space_credit
								];
							}
						}

						// buat order baru
						$newInvoice = $this->_save_orderPayment($temp['order_id'], $newPayment);
						$temp['next_invoice'] = $newInvoice->code;
						$temp['new_invoice'] = $newInvoice;

						// insert space debet jika $space_credit_used != 0
						if ( $newInvoice->space_credit_used != 0 ){
							\Space::create([
									'user_id'	=> $temp['user_id'],
									'type'		=> 'debet',
									'nominal'	=> $newInvoice->space_credit_used,
									'keterangan'=> 'Credit used for purchases invoice #'.$newInvoice->code,
							]);
						}
					}

					if ( $lunas ) {
						// kirim email langsung lunas
						$this->_sendRecurringInvoiceLunasMail( $temp );
					} else {
						// kirim email invoice expired & invoice baru
						$this->_sendRecurringInvoiceMail( $temp );
					}
				} elseif ( $temp['expired_on'] == $interval_returned ) {
					// lakukan pengembalian barang
					$returnScheduleInput = [
						'user_id'				=> $temp['user_id'],
						'order_id'			=> $temp['order_id'],
						'return_date'		=> \Carbon\Carbon::parse( $temp['expired_date'] )->addDays(4)->format('Y-m-d'),
						'return_time' 	=> '08:00am - 10:00am',
						'stuffs' 				=> explode(',', implode(',', array_column( $temp['stuff'], 'ids' ) ) ),
						'city_id' 			=> '',
						'other_address' => '',
						'status' 				=> 0,
					];
					$this->createReturnSchedule( $returnScheduleInput );

					$_newInvoice = $temp['new_invoice'];

					 //hapus invoice baru yang dibuat
					\OrderPayment::where('code', $_newInvoice->code)->delete();

					// cek apakah invoice baru menggunakan space credit, jika iya, hapus space debet nya untuk invoice ini.
					if ( $_newInvoice->space_credit_used != 0 ) {
						\Space::where('keterangan', 'like', '%#'.$_newInvoice->code.'%')->delete();
					}

					// kirim email pengembalian barang
					$this->_sendRecurringInvoiceKirimBarangMail( $temp );
				}
			}

			return $data;
	}

	/**
	 * Get Invoice Info
	 *
	 * @param \Illuminate\Database\Eloquent\Model
	 * @return array $data
	 */
	protected function _getInvoiceInfo($orderPayments)
	{
		$data = [];

		foreach ( $orderPayments as $payment ) {
			$temp = (array)$payment;

			// get user info
			$temp['user_info'] = \User::find($payment->user_id);

			/**
			** Menentukan date invoice used, expired date dan expired on dengan Carbon
			*/

			// get date of invoice used
			if ( $payment->used_start == null ) {
				if ( $payment->pickup_date == null ){
					$temp['date_invoice_used'] = $payment->delivery_date;
				} else {
					$temp['date_invoice_used'] = $payment->pickup_date;
				}
			} else {
				$temp['date_invoice_used'] = $payment->used_start;
			}

			// get expired date of invoice
			$temp['expired_date'] = \Carbon\Carbon::parse($temp['date_invoice_used'])->addDays(31);

			// get interval day to expired date
			$now = \Carbon\Carbon::parse( date('Y-m-d') );
			$temp['expired_on'] = \Carbon\Carbon::parse( $temp['expired_date'] )->diffInDays( $now, false );

			// get stuff invoice
			$temp['stuff'] = \OrderStuff::where('order_id', $payment->order_id)
					->whereNull('return_schedule_id')
					->select([
							'type', \DB::raw("COUNT(*) jumlah"),
							\DB::raw("if(type = 'box','".\Config::get('thankspace.box.price')."','".\Config::get('thankspace.item.price')."') price"),
							\DB::raw("(COUNT(*) * if(type = 'box','".\Config::get('thankspace.box.price')."','".\Config::get('thankspace.item.price')."')) subtotal"),
							\DB::raw("GROUP_CONCAT(description SEPARATOR ',') barang "),
							\DB::raw("GROUP_CONCAT(id SEPARATOR ',') ids ")
					])
					->groupBy('type')
					->get()
					->toArray();

			// set input for new invoice
			$temp['new_invoice_input'] = [ 'payment_reff' => $payment->invoice_code,
							'used_start' => $temp['expired_date']->format('Y-m-d') ];
			foreach ($temp['stuff'] as $val) {
				$type = $val['type'];
				$temp['new_invoice_input'][$type] = $val['jumlah'];
			}

			// new invoice
			$temp['new_invoice'] = null;
			if ( $temp['next_invoice'] != null ) {
				$temp['new_invoice'] = \OrderPayment::where('code', $temp['next_invoice'])->first();
			}

			// push to array for return data
			array_push($data, $temp);
		}

		return $data;
	}

	protected function _sendRecurringInvoiceMail($params)
	{
		$to = [
			'code'		=>	$params['invoice_code'],
			'email'		=>	$params['user_info']['email'],
			'name'		=>	$params['user_info']['firstname'].' '.$params['user_info']['lastname'],
		];

		$data = $params;

		\Mail::send('emails.recurring-invoice.notif-recurring-invoice', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] Recurring invoice #'.$to['code'].' di ThankSpace');
		});
	}

	protected function _sendRecurringInvoiceLunasMail($params)
	{
		$to = [
			'code'		=>	$params['invoice_code'],
			'email'		=>	$params['user_info']['email'],
			'name'		=>	$params['user_info']['firstname'].' '.$params['user_info']['lastname'],
		];

		$data = $params;

		\Mail::send('emails.recurring-invoice.langsung-lunas', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] Recurring invoice #'.$to['code'].' di ThankSpace');
		});
	}

	protected function _sendRecurringInvoiceKirimBarangMail($params)
	{
		$to = [
			'code'		=>	$params['invoice_code'],
			'email'		=>	$params['user_info']['email'],
			'name'		=>	$params['user_info']['firstname'].' '.$params['user_info']['lastname'],
		];

		$data = $params;

		\Mail::send('emails.recurring-invoice.kirim-barang', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] Recurring invoice #'.$to['code'].' di ThankSpace');
		});
	}
}
