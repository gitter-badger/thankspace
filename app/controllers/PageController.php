<?php

class PageController extends BaseController {

	public function index()
	{
		$data = [

		];
		return View::make('page.index', $data);
	}
	
	public function about()
	{
		$data = [];
		return View::make('page.about_us', $data);
	}

	public function storagerules()
	{
		$data = [];
		return View::make('page.storage_rules', $data);
	}

	public function contactus()
	{
		$data = [];
		return View::make('page.contact_us', $data);
	}

	public function faq()
	{
		$data = [];
		return View::make('page.faq', $data);
	}


	public function careers()
	{
		$data = [];
		return View::make('page.careers', $data);
	}
	
	public function tos()
	{
		$data = [];
		return View::make('page.terms-and-conditions', $data);
	}

}
