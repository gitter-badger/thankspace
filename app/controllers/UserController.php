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
		return __FUNCTION__;
	}


	public function signout()
	{
		return __FUNCTION__;
	}

}
