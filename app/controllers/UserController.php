<?php

class UserController extends BaseController {

	public function dashboard()
	{
		// logic type user
		switch (Auth::user()->type) {
			case 'driver':
				$this->_driverDashboard();
			break;

			case 'admin':
				return $this->_adminDashboard();
			break;
			
			// default for user
			default:
				return $this->_userDashboard();
			break;
		}
	}


	public function _userDashboard()
	{
		$orderRepo = app('OrderRepo');
		$data = [
			'storages' => $orderRepo->getStorageList()
		];
		return View::make('user.storage', $data);
	}


	public function _driverDashboard()
	{
		return __FUNCTION__;
	}


	public function _adminDashboard()
	{
		$orderRepo = app('OrderRepo');
		$data = [
			'invoices' => $orderRepo->getInvoiceList()
		];
		return View::make('admin.history', $data);
	}


	public function invoice()
	{
		$orderRepo = app('OrderRepo');
		$data = [
			'invoices' => $orderRepo->getInvoiceList()
		];
		return View::make('user.invoice', $data);
	}
	
	
	public function confirmPayment()
	{
		if ( !Input::has('order_payment_id') ) {
			return Redirect::back()->with('message', 'No invoice selected');
		}
		
		$orderRepo = app('OrderRepo');
		$input = Input::get();
		if ( $orderRepo->confirmPayment($input) )
		{
			return Redirect::back()->with('message', 'success');
		}
		return Redirect::back()->with('message', $userRepo->getErrors());
	}


	public function setting()
	{
		$data = [];
		return View::make('user.setting', $data);
	}
	
	
	public function signin()
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}

		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->login($input) )
		{
			return [ 'status' => 200, 'redirect' => route('user.dashboard') ];
		}
		return $userRepo->getErrors();
	}
	
	
	public function signup()
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}

		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->register($input) )
		{
			return [ 'status' => 200, 'redirect' => route('user.dashboard') ];
		}
		return $userRepo->getErrors();
	}


	public function signout()
	{
		Auth::logout();
		return Redirect::route('page.index');
	}
	
	
	public function updateProfile()
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}
		
		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->updateProfile($input) )
		{
			return [ 'status' => 200, 'message' => 'Profile Anda berhasil diperbarui' ];
		}
		return $userRepo->getErrors();
	}
	
	
	public function updatePassword()
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}
		
		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->updatePassword($input) )
		{
			return [ 'status' => 200, 'message' => 'Kata Sandi Anda berhasil diperbarui' ];
		}
		return $userRepo->getErrors();
	}
	
	
	public function checkPassword()
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}
		
		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->checkPassword($input) )
		{
			return [ 'status' => 200 ];
		}
		return $userRepo->getErrors();
	}

}
