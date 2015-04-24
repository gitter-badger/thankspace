<?php

class UserController extends BaseController {

	public function dashboard()
	{
		// logic type user
		switch (Auth::user()->type) {
			case 'driver':
				return $this->_driverDashboard();
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
		$orderRepo = app('OrderRepo');

		$data = [
			'storages' => $orderRepo->getStorageList(['page_name' => 'page_queue']),
			'tasks'	=> $orderRepo->getDriverSchedule(),
		];

		return View::make('driver.index', $data);
	}


	public function _adminDashboard()
	{
		$orderRepo = app('OrderRepo');
		$data = [
			'invoices' => $orderRepo->getOrderList()
		];
		return View::make('admin.history', $data);
	}
	
	
	public function memberList()
	{
		$userRepo = app('UserRepo');
		$data = [
			'members' => $userRepo->getMemberList()
		];
		return View::make('admin.member', $data);
	}
	
	
	public function memberAdd()
	{
		$data = [];
		return View::make('admin.member-add', $data);
	}
	
	
	public function memberAddPost()
	{	
		$userRepo = app('UserRepo');
		$input = Input::get();
		$input += [ 'password' => generate_password(6) ];
		if ( $userRepo->register($input) )
		{
			return Redirect::route('user.member_list')
				->with([ 'alert' => 'success', 'messages' => [ 'A new member successfully created' ] ]);
		}
		return Redirect::back()
			->withInput()
			->with([ 'alert' => 'error', 'messages' => $userRepo->getErrors() ]);
	}
	
	
	public function memberEdit($id)
	{
		$user = app('UserRepo')->_getUserById($id);
		$data = [ 'user' => $user ];
		return View::make('admin.member-edit', $data);
	}
	
	
	public function memberEditPut($id)
	{
		$userRepo = app('UserRepo');
		$input = Input::get();
		$input += [ 'user_id' => $id ];
		if ( $userRepo->updateProfile($input) )
		{
			return Redirect::route('user.member_list')
				->with([ 'alert' => 'success', 'messages' => [ 'Member data successfully updated' ] ]);
		}
		return Redirect::back()
			->withInput()
			->with([ 'alert' => 'error', 'messages' => $userRepo->getErrors() ]);
	}
	
	
	public function memberDelete($id)
	{
		$userRepo = app('UserRepo');
		if ( $userRepo->deleteUser($id) )
		{
			return Redirect::back()
				->with([ 'alert' => 'success', 'messages' => [ 'Selected member has been deleted' ] ]);
		}
		return Redirect::back()
			->with([ 'alert' => 'error', 'messages' => $userRepo->getErrors() ]);
	}


	public function invoice()
	{
		$orderRepo = app('OrderRepo');
		$data = [
			'invoices' => $orderRepo->getOrderList()
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


	public function modalStorageDetail($id)
	{
		$storage = app('UserRepo')->getStorageDetail($id);
		$data = [
			'modal_title' => 'Order #'. $storage['orderPayment']['code'],
			'storage' => $storage,
		];
		return View::make('modal.storage_detail', $data);
	}


	public function modalStorageEdit($id)
	{
		$storage = app('UserRepo')->getStorageDetail($id);
		$data = [
			'modal_title' => 'Order #'. $storage['orderPayment']['code'] . ' - Stuffs',
			'storage' => $storage,
			'stuffs' => $storage['orderStuff'],
		];
		return View::make('modal.storage_edit', $data);
	}


	public function storageUpdate()
	{
		$stuff = Input::get('stuff');
		foreach ($stuff as $key => $value)
		{
			$orderStuff = \OrderStuff::find($value['id']);
			$orderStuff->fill($value)->save();
		}
		return Redirect::route('user.dashboard');
	}

}
