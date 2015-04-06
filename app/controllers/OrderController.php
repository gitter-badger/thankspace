<?php

class OrderController extends BaseController {

	public function index()
	{
		$data = [
			'title' => 'Order index',
			'qty_box_list' => app('OrderRepo')->quantity_box_dropdown(),
		];
		return View::make('order.index', $data);
	}


	public function schedule()
	{
		$data = [
			'title' => __FUNCTION__,
			'calendar' => $this->getFormCalendar(),
		];
		return View::make('order.schedule', $data);

	}


	public function payment()
	{
		$data = [
			'title' => __FUNCTION__,
		];
		return View::make('order.payment', $data);
	}


	public function review()
	{
		$data = [
			'title' => __FUNCTION__,
		];
		return View::make('order.review', $data);
	}


	public function completed()
	{
		$data = [
			'title' => __FUNCTION__,
		];
		return View::make('order.completed', $data);
	}


	/**
	 * For handle order step by step
	 * 
	 * @return Redirect
	 */
	public function progress()
	{
		$order_session = Session::get('order');

		switch (Input::get('step'))
		{
			case 'index':
				Session::put('order.index', Input::only([
					'type', 'quantity_box', 'quantity_custom', 'quantity_item', 'description'
				]));
			break;
			
			case 'schedule':
				Session::put('order.schedule', Input::only([
					'delivery_day', 'delivery_month', 'delivery_year', 'delivery_time',
					'type', 'pickup_day', 'pickup_month', 'pickup_year', 'pickup_time',
				]));
			break;
			
			case 'payment':
				# code...
			break;
			
			case 'review':
				# code...
			break;
		}

		$redirectTo = Input::get('redirect_to');
		return Redirect::to($redirectTo);
	}


	/**
	 * Reset order
	 *
	 * @return Redirect
	 */
	public function reset()
	{

	}

}
