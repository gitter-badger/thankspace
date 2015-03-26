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
		return __FUNCTION__;
	}

}
