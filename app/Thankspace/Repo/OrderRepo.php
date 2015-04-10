<?php namespace Thankspace\Repo;

class OrderRepo extends BaseRepo
{
	
	public function __construct(\Order $order)
	{
		$this->model = $order;
	}
	
	
	public function getStorageList(array $input = array())
	{
		$user_id = ( isset($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		
		$order = \Order::with('OrderSchedule', 'OrderStuff', 'ReturnSchedule')
					->join('order_payment', 'order_payment.order_id', '=', 'order.id')
					->where('order_payment.status', 2);
		
		if( \Auth::user()->type == 'user' )
		{
			$order = $order->where('order.user_id', $user_id);
		} else {
			$order = $order->with('User');
		}
		
		$order = $order->paginate(20);
		
		if ( $order ) {
			return $order;
		} else {
			return false;
		}
	}
	
	
	public function getInvoiceList(array $input = array())
	{
		$user_id = ( isset($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		
		$order = \Order::with('OrderSchedule', 'OrderPayment', 'ReturnSchedule');
		
		if( \Auth::user()->type == 'user' )
		{
			$order = $order->where('user_id', $user_id);
		} else {
			$order = $order->with('User');
		}
		
		$order = $order->paginate(20);
		
		if ( $order ) {
			return $order;
		} else {
			return false;
		}
	}
	
	public function confirmPayment(array $input = array())
	{
		$status = ( \Auth::user()->type == 'admin' ? 2 : 1 );
		$confirm = \OrderPayment::whereIn('id', $input['order_payment_id'])->update([ 'status' => $status ]);
		if ( $confirm )
		{
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


	/**
	 * Save into order
	 * @param  array $input this array require 3 key step : index, schedule, payment
	 * @return boolean
	 */
	public function save($orderData)
	{
		$order = $this->_save_order($orderData['index']);

		$this->_save_orderSchedule($order['id'], $orderData['schedule']);

		$this->_save_orderPayment($order['id'], $orderData['payment']);
	}


	protected function _save_order($orderIndex)
	{
		$orderIndex['user_id'] = \Auth::user()->id;

		// handle quantity by user select
		if ($orderIndex['type'] == 'box')
		{
			// if quantity box more than 21. use quantity_custom field
			if ($orderIndex['quantity_box'] >= 21)
			{
				$orderIndex['quantity'] = $orderIndex['quantity_custom'];
			}
			
			// if more less than 21, use quantity_box field
			else
			{
				$orderIndex['quantity'] = $orderIndex['quantity_box'];
			}
		}
		else
		{
			// if user choose order type box, fill quantity with quantity_item field
			$orderIndex['quantity'] = $orderIndex['quantity_item'];
		}

		// save on to order table
		return \Order::create($orderIndex);
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
		return \OrderPayment::create($input);
	}
}