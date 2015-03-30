<?php

class UserController extends BaseController {

	public function index()
	{
		$data = [

		];
		return View::make('user.index', $data);
	}


	public function storage()
	{
		$data = [

		];
		return View::make('user.storage', $data);
	}


	public function invoice()
	{
		$data = [

		];
		return View::make('user.invoice', $data);
	}


	public function setting()
	{
		$data = [

		];
		return View::make('user.setting', $data);
	}
	
	
	public function signin()
	{
		return __FUNCTION__;
	}
	
	
	public function signup()
	{
		$customrules = [
			'email'	=>	'required|unique:user,email',
		];

		$validation = User::validate(Input::get(), $customrules);
		
		if ( $validation->passes() ) {
			$user = User::create(Input::get());
			Session::put('userdata', User::where('id', $user->id)->first());
			return [ 'status' => 200, 'redirect' => URL::route('user.dashboard') ];
		} else {
			return [ 'status' => 200, 'message' => $validation->messages()->all(':message') ];
		}
	}


	public function signout()
	{
		return __FUNCTION__;
	}
	
	
	public function dashboard()
	{
		return Session::get('userdata');
	}

}
