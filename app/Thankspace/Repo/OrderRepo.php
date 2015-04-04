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
		
		$order = \Order::with('OrderSchedule', 'ReturnSchedule')
					->join('order_payment', 'order_payment.order_id', '=', 'order.id')
					->where('order_payment.status', 2)
					->where('order.user_id', $user_id)
					->paginate(20);
		
		if ( $order ) {
			return $order;
		} else {
			return false;
		}
	}
	
	
	public function getInvoiceList(array $input = array())
	{
		$user_id = ( isset($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		
		$order = \Order::with('OrderSchedule', 'OrderPayment', 'ReturnSchedule')
					->where('user_id', $user_id)
					->paginate(20);
		
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
}