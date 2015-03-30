<?php

class OrderController extends BaseController {

	public function index()
	{
		$data = [];
		return View::make('order.index', $data);
	}


	public function schedule()
	{
		$data = [];
		return View::make('order.schedule', $data);

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


	/**
	 * For handle order step by step
	 * 
	 * @return Redirect
	 */
	public function progress()
	{
		$redirectTo = Input::get('redirect_to');

		return Redirect::to($redirectTo);
	}

}
