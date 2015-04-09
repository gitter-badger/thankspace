<?php

class OrderController extends BaseController {

	public function index()
	{
		$data = [
			'title' => 'Order index',
			'qty_box_list' => app('OrderRepo')->quantity_box_dropdown(),
			'form_data' => Session::get('order.index'),
		];
		return View::make('order.index', $data);
	}


	public function schedule()
	{
		$data = [
			'title' => __FUNCTION__,
			'calendar' => $this->getFormCalendar(),
			'form_data' => Session::get('order.schedule'),
		];
		return View::make('order.schedule', $data);

	}


	public function payment()
	{
		$data = [
			'title' => __FUNCTION__,
			'form_data' => Session::get('order.payment'),
		];
		return View::make('order.payment', $data);
	}


	public function review()
	{
		$data = [
			'title' => __FUNCTION__,
			'review' => Session::get('order'),
			'user' => Auth::user(),
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
		$order_session = Session::all();

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
				
				if ( ! Auth::check())
				{
					$userRepo = app('UserRepo');
					if (Input::get('user_action') == 'signin')
					{
						// if fails login redirect back with errors and input
						if ( ! $userRepo->login(Input::get('credentials')) )
						{
							return Redirect::back()
								->withErrors()
								->withInput();
						}
					}
					elseif (Input::get('user_action') == 'signup')
					{
						// if fails register redirect back with errors and input
						if ( ! $userRepo->register(Input::only([
								'firstname', 'lastname', 'email', 'phone', 'address', 'password'
							])) )
						{
							return Redirect::back()
								->withErrors()
								->withInput();
						}
					}
				}

				Session::put('order.payment', Input::only([
					'method', 'message'
				]));

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
		Session::forget('order');

		return Redirect::route('order.index');
	}

}
