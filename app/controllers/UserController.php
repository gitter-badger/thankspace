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

		if ( Input::has('sch') && Input::get('sch') == 'return' )
		{
			$data = [
				'schedules'	=> $orderRepo->getReturnSchedule([ 'is_paginated' => 1, 'page_name' => 'page_schedule' ]),
				'tasks'		=> $orderRepo->getReturnSchedule([ 'is_paginated' => 1, 'page_name' => 'page_task', 'user_id' => Auth::user()->id ]),
			];

			return View::make('driver.index_return', $data);
		} else {
			$data = [
				'storages'	=> $orderRepo->getStorageList([ 'page_name' => 'page_queue' ]),
				'tasks'		=> $orderRepo->getDeliverySchedule([ 'page_name' => 'page_task', 'user_id' => Auth::user()->id ]),
			];

			return View::make('driver.index', $data);
		}
	}


	public function _adminDashboard()
	{
		$orderRepo = app('OrderRepo');
		$data = [
			'invoices' => $orderRepo->getOrderList()
		];
		return View::make('admin.history', $data);
	}


	public function returnRequest()
	{
		$data = [
			'returns' => app('OrderRepo')->getReturnSchedule(['status' => 0, 'is_paginated' => 1]),
		];
		return View::make('admin.return_request', $data);
	}


	/**
	 * [postReturnRequest description]
	 *
	 * @param  integer $id return_request_id
	 * @return Redirect
	 */
	public function postReturnRequest($return_id)
	{
		$return = app('OrderRepo')->getReturnSchedule(['id' => $return_id, 'status' => 0]);
		$data = [
			'return' => $return,
		];

		\Mail::send('emails.return_schedule_confirm', $data, function($message) use ($return)
		{
			$user = $return['order']['user'];

			$message->to($user['email'], $user['name'])
					->subject('[ThankSpace] Confirmation return #'. $return['order']['order_payment']['code'].' di ThankSpace');
		});

		// update the return schedule
		\ReturnSchedule::where('id', $return_id)->update(['status' => 1]);

		return Redirect::route('admin.returnRequest')->withMessage(['success' => 'Return request telah sukses terkonfirmasi']);
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
		$cities = getCities();
		$data = [ 'list_cities' => $cities ];
		return View::make('admin.member-add', $data);
	}


	public function memberAddPost()
	{
		$userRepo = app('UserRepo');
		$input = Input::get();
		$input += [ 'password' => generate_random_code(6) ];
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
		$cities = getCities();
		$data = [
			'user'			=> $user,
			'list_cities'	=> $cities
		];
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
		return Redirect::back()->with('message', $orderRepo->getErrors());
	}


	public function setting()
	{
		$cities = getCities();
		$data = [ 'list_cities' => $cities ];
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


	public function modalInvoiceDetail($id)
	{
		$invoice = app('UserRepo')->getInvoiceDetail($id);
		$data = [
			'modal_title'	=> 'Order #'. $invoice['orderPayment']['code'],
			'invoice'		=> $invoice,
		];
		return View::make('modal.invoice_detail', $data);
	}


	public function modalReturnRequestConfirmation($return_id)
	{
		$return = app('OrderRepo')->getReturnSchedule(['id' => $return_id, 'status' => 0]);
		$data = [
			'modal_title'	=> 'Return confirmation',
			'return'		=> $return,
		];
		return View::make('modal.return_confirmation', $data);
	}


	public function modalStorageDetail($id)
	{
		$storage = app('UserRepo')->getStorageDetail($id);
		$data = [
			'modal_title'	=> 'Order #'. $storage['orderPayment']['code'],
			'storage'		=> $storage,
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


	/**
	 * show modal form return schedule
	 * @return View
	 */
	public function modalStorageReturn($id)
	{
		$storage = app('UserRepo')->getStorageDetail($id);
		$cities = getCities();
		$data = [
			'storage' => $storage,
			'list_cities' => $cities,
			'modal_title' => 'Return Schedule Order : #'. $storage['order_payment']['code'],
		];
		return View::make('modal.storage_return', $data);
	}


	/**
	 * Processing return schedule
	 * @return redirect
	 */
	public function storageReturnProcess($id)
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}

		$input = Input::get();
		$input['status'] = 0;
		$orderRepo = app('OrderRepo');
		if ( $orderRepo->createReturnSchedule($input))
		{
			return [ 'status' => 200, 'redirect' => route('user.dashboard') ];
		}
		return $orderRepo->getErrors();
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


	public function setDeliveryStored()
	{
		if ( !Input::has('order_schedule_id') ) {
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No delivery schedule selected',
					'type'	=> 'error',
				]
			]);
		}

		$orderRepo = app('OrderRepo');
		$input = Input::get();
		if ( $orderRepo->setDeliveryStored($input) )
		{
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'smile',
					'msg'	=> 'Your selected delivery schedule has been set stored',
					'type'	=> 'success',
				]
			]);
		}
		return Redirect::back()->with($orderRepo->getErrors());
	}


	public function assignDelivery()
	{
		if ( !Input::has('order_id') ) {
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No order selected',
					'type'	=> 'error',
				]
			]);
		}

		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->assignDelivery($input) )
		{
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'smile',
					'msg'	=> 'Your selected order has been assigned to delivery',
					'type'	=> 'success',
				]
			]);
		}
		return Redirect::back()->with($userRepo->getErrors());
	}


	/**
	 * Handle send email for user forget password
	 * @return Redirect
	 */
	public function forgotPassword()
	{
		if (! Input::get('email'))
			return 'Specify your email first !';

		// check for existance email
		$user = \User::where('email', Input::get('email'))->first();
		if ( ! $user )
		{
			return 'This email "'. Input::get('email') .'" is not exist on our database';
		}

		// create token
		$time = time() + 60*60; // the expiration time
		$token = Crypt::encrypt($time);
		$email = Crypt::encrypt(Input::get('email'));
		$data = [
			'token'		=> $token,
			'email'		=> $email,
			'firstname' => $user->firstname,
			'url_reset_password' => route('user.forgotPasswordForm') .'?token='. $token .'&e='. $email,
		];

		// send user email with link and token to reset password form
		\Mail::send('emails.reset-password', $data, function($message)
		{
			$message->to(Input::get('email'), 'Halo pelanggan setia thankspace')
					->subject('[ThankSpace] Reset Password');
		});

		return [
			'status' => 200,
			'message' => 'Link perubahan password sudah kami kirim ke email anda. silahkan periksa email anda dan ikuti instruksi di dalamnya.'
		];
	}


	public function forgotPasswordForm()
	{
		$token = Input::get('token');
		$email = Input::get('e');
		if ( ! $token OR ! $email) {
			return App::abort(404);
		}

		$token = Crypt::decrypt($token);
		$email = Crypt::decrypt($email);
		if ( time() >= $token  ) {
			return App::abort(403, 'Your token has been expired');
		}

		$data = [
			'title' => 'Reset Password',
			'email' => $email,
		];

		return View::make('user.reset_password', $data);
	}


	public function forgotPasswordProcess()
	{
		$input = Input::get();
		$v = Validator::make($input, array(
			'email' => 'required|email',
			'password' => 'required|confirmed|min:6',
		));
		if ($v->fails()) {
			return Redirect::back()->withInput()->withMessages($v->messages()->all());
		}

		$user = \User::where('email', $input['email'])->first();
		$user->password = $input['password'];
		if ($user->save())
		{
			$data = [ 'user' => $user ];
			\Mail::send('emails.reset-password-success', $data, function($message) use($user)
			{
				$message->to($user['email'], 'Halo pelanggan setia thankspace')
						->subject('[ThankSpace] Selamat Reset Password Berhasil');
			});

			Auth::loginUsingId($user['id']);
			return Redirect::route('user.dashboard');
		}

	}


	public function setReturnedSet()
	{
		if ( !Input::has('return_schedule_id') ) {
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No return schedule selected',
					'type'	=> 'error',
				]
			]);
		}

		$orderRepo = app('OrderRepo');
		$input = Input::get();
		if ( $orderRepo->setReturnedSet($input) )
		{
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'smile',
					'msg'	=> 'Your selected return schedule has been set returned',
					'type'	=> 'success',
				]
			]);
		}
		return Redirect::back()->with($orderRepo->getErrors());
	}


	public function assignReturn()
	{
		if ( !Input::has('return_schedule_id') ) {
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No schedule selected',
					'type'	=> 'error',
				]
			]);
		}

		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->assignReturn($input) )
		{
			return Redirect::back()->with([ 'message' =>
				[
					'ico'	=> 'smile',
					'msg'	=> 'Your selected schedule has been assigned to you',
					'type'	=> 'success',
				]
			]);
		}
		return Redirect::back()->with($userRepo->getErrors());
	}


	public function modalReturnedStuff($id)
	{
		$stuff = app('OrderRepo')->getReturnedStuffs($id);
		$data = [
			'modal_title'	=> 'Returned Stuffs from Order #'. $stuff['order']['order_payment']['code'],
			'stuffs'		=> $stuff,
		];
		return View::make('modal.returned_stuff', $data);
	}

	/**
	 * Referral feature
	 */
	public function referral()
	{
		if(Auth::user()->ref_code == null || Auth::user()->ref_code == ''){
			return View::make('user.input-referral');
		}

		return View::make('user.referral');
	}

	public function referral_save()
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}

		$userRepo = app('UserRepo');
		$input = Input::get();
		if ( $userRepo->change_ref($input) )
		{
			return [ 'status' => 200, 'message' => 'Kode referral anda berhasil diatur' ];
		}

		return $userRepo->getErrors();
	}

	public function ref_code_check($code)
	{
		if ( ! Request::ajax()) {
			return App::abort(404);
		}

		if( User::where('ref_code',$code)->count() ){
			return [ 'status' => 200, 'message' => 'Isi data Anda untuk pendaftaran dan dapatkan space credit Rp 50.000' ];
		}else{
			return [ 'status' => 404];
		}
	}

}
