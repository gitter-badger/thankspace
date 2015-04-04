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
				$this->_adminDashboard();
			break;
			
			// default for user
			default:
				return $this->_userDashboard();
			break;
		}
	}


	public function _userDashboard()
	{
		$data = [

		];
		return View::make('user.storage', $data);
	}


	public function _driverDashboard()
	{
		return __FUNCTION__;
	}


	public function _adminDashboard()
	{
		return __FUNCTION__;
	}


	public function invoice()
	{
		$data = [

		];
		return View::make('user.invoice', $data);
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
		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->checkPassword($input) )
		{
			return [ 'status' => 200 ];
		}
		return $userRepo->getErrors();
	}

}
