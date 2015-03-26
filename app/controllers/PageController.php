<?php

class PageController extends BaseController {

	public function index()
	{
		$data = [

		];
		return View::make('page.index', $data);
	}

}
