<?php

class OrderController extends BaseController {

	public function index()
	{
		$data = [
			'title' => 'Order index',
			'qty_box_list' => app('OrderRepo')->quantity_box_dropdown(),
			'qty_item_list' => app('OrderRepo')->quantity_item_dropdown(),
			'form_data' => Session::get('order.index'),
		];
		return View::make('order.index', $data);
	}


	public function schedule()
	{
		if ( empty(Session::get('order.index'))) {
			return Redirect::route('order.index');
		}

		$data = [
			'title' => __FUNCTION__,
			'calendar' => $this->getFormCalendar(),
			'form_data' => Session::get('order.schedule'),
		];
		return View::make('order.schedule', $data);

	}


	public function payment()
	{
		if ( empty(Session::get('order.schedule'))) {
			return Redirect::route('order.schedule');
		}

		$data = [
			'title' => __FUNCTION__,
			'list_cities' => getCities(),
			'form_data' => Session::get('order.payment'),
		];
		return View::make('order.payment', $data);
	}


	public function review()
	{
		if ( empty(Session::get('order.payment'))) {
			return Redirect::route('order.payment');
		}

		$data = [
			'title' => __FUNCTION__,
			'review' => Session::get('order'),
			'user' => Auth::user(),
		];
		return View::make('order.review', $data);
	}


	public function completed()
	{
		$orderData = Session::get('order');
		if ( empty($orderData)) {
			return Redirect::route('order.index');
		}

		app('OrderRepo')->save($orderData);

		// delete order data
		Session::forget('order');
		
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

				$delivery_date = Input::get('delivery_year') .'-'. Input::get('delivery_month') .'-'. Input::get('delivery_day');
				if (! $this->_validateDateShouldLater($delivery_date)) {
					return Redirect::back()
						->withMessages(['Delivery date should greater than today'])
						->withInput();
				}

				// if pickup immediaetly we pass this validation
				if (Input::get('type') != 'immediately')
				{
					$pickup_date = Input::get('pickup_year') .'-'. Input::get('pickup_month') .'-'. Input::get('pickup_day');
					if (! $this->_validateDateShouldLater($pickup_date)) {
						return Redirect::back()
							->withMessages(['Pickup date should greater than today'])
							->withInput();
					}
				}

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
								->withMessages($userRepo->getErrors())
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
								->withMessages($userRepo->getErrors())
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


	protected function _validateDateShouldLater($date)
	{
		$today = date('Y-m-d');
		if ($today > $date) {
			return false;
		}

		return true;
	}
	
	
	public function modalOrderGallery($id)
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}
		
		$storage = app('UserRepo')->getStorageDetail($id);
		$gallery = app('OrderRepo')->getOrderGallery([ 'order_id' => $id ]);
		
		$data = [
			'storage'		=> $storage,
			'gallery'		=> $gallery,
			'modal_title'	=> 'Gallery Order #'. $storage['order_payment']['code'],
		];
		
		return View::make('modal.order_gallery', $data);
	}
	
	
	public function modalOrderGalleryUpload($id)
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}
		
		$storage = app('UserRepo')->getStorageDetail($id);
		
		$data = [
			'id'			=> $id,
			'modal_title'	=> 'Upload Image(s) to Order #'. $storage['order_payment']['code'],
		];
		
		return View::make('modal.order_gallery_upload', $data);
	}

}
