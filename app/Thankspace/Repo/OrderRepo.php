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
		$user_type = \Auth::user()->type;
		$user_id = ( isset($option['user_id']) ? $option['user_id'] : \Auth::user()->id );
		
		$order = \Order::with('OrderSchedule', 'OrderStuff', 'ReturnSchedule')
					->join('order_payment', 'order_payment.order_id', '=', 'order.id')
					->where('order_payment.status', 2);
		
		/**
		 * For user list page
		 */
		if( $user_type == 'user' )
		{
			$order = $order->where('order.user_id', $user_id);
		}

		/**
		 * For driver list page
		 */
		elseif($user_type == 'driver')
		{
			if (!empty($option['page_name']))
			{
				\Paginator::setPageName($option['page_name']);
			}
			$order = $order->with('User', 'DeliverySchedule')->orderBy('order.created_at', 'desc');
		}

		/**
		 * For admin list page
		 */
		else
		{
			$order = $order->with('User');
		}
		
		$order = $order->where('order.status', 1)->paginate(20);
		
		if ( $order ) {
			return $order;
		} else {
			return false;
		}
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
			->select('delivery_schedule.*', 'order_schedule.*', 'order_payment.code')
			->paginate(20);

		return $order;
	}

	
	/**
	 * User order/transaction history
	 * 
	 * @param  array  $option
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getOrderList(array $option = array())
	{
		$user_id = ( isset($option['user_id']) ? $option['user_id'] : \Auth::user()->id );
		
		$order = \Order::with('OrderSchedule', 'OrderPayment', 'ReturnSchedule')->orderBy('id', 'desc');
		
		if( \Auth::user()->type == 'user' )
		{
			$order = $order->where('user_id', $user_id);
		} else {
			$order = $order->with('User');
		}
		
		$order = $order->where('order.status', 1)->paginate(20);
		
		if ( $order ) {
			return $order;
		} else {
			return false;
		}
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
		if ( $confirm )
		{
			
			if ( $status == 2 )
			{
				$this->_sendConfirmPaymentMail($input['order_payment_id']);
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

		$this->_save_orderPayment($order->id, $orderData['payment']);
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
		$input['order_id'] = $order_id;
		$input['code'] = null;
		return \OrderPayment::create($input);
	}
	
	
	protected function _sendConfirmPaymentMail(array $id = array())
	{
		$orders = \OrderPayment::with('order.user')->whereIn('id', $id)->get();
		foreach( $orders as $order )
		{
			$fullname = ucfirst($order['order']['user']['firstname']) .' '. ucfirst($order['order']['user']['lastname']);
			
			$to = [
				'code'		=>	$order['code'],
				'email'		=>	$order['order']['user']['email'],
				'fullname'	=>	$fullname,
			];
			
			$data = [
				'code'		=>	$order['code'],
				'date'		=>	date('d/m/Y', strtotime($order['updated_at'])),
				'fullname'	=>	$fullname,
			];
			
			\Mail::send('emails.confirm-payment-success', $data, function($message) use ($to)
			{
				$message->to($to['email'], $to['fullname'])
						->subject('[ThankSpace] Pembayaran invoice #'.$to['code'].' sudah kami terima');
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
		$confirm = \OrderSchedule::whereIn('id', $input['order_schedule_id'])->update([ 'status' => 1 ]);
		if ( $confirm )
		{	
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


	/**
	 * Add return schedule to boxes
	 */
	public function createReturnSchedule(array $input)
	{
		$input['user_id'] = ( ! empty($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		$validation = \ReturnSchedule::validate($input, ['stuffs' => 'required|array']);
		if ( $validation->fails() )
		{
			$this->setErrors($validation->messages()->all(':message'));
			return false;
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
	 * @param  array  $option
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
		
		$schedule = $schedule->paginate(20);
		
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
		$confirm = \ReturnSchedule::whereIn('id', $input['return_schedule_id'])->update([ 'status' => 1 ]);
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
}