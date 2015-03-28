<?php

class OrderController extends BaseController {

	public function index()
	{
		$data = [];
		return View::make('order.index', $data);
	}


	public function schedule()
	{
		return __FUNCTION__;
	}


	public function payment()
	{
		return __FUNCTION__;
	}


	public function review()
	{
		return __FUNCTION__;
	}


	public function completed()
	{
		return __FUNCTION__;
	}

}
