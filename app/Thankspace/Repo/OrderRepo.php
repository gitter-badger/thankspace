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
}