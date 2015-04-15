<?php namespace Thankspace\Repo;

class UserRepo extends BaseRepo
{
	
	public function __construct(\User $user)
	{
		$this->model = $user;
	}
	
	
	public function getMemberList()
	{
		$user = $this->model->paginate(20);
		
		if ( $user ) {
			return $user;
		} else {
			return false;
		}
	}
	
	
	public function updateProfile(array $input = array())
	{
		$id = ( isset($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		
		$customrules = [
			'email'		=>	'required|email|unique:user,email,'.$id,
			'password'	=>	'sometimes'
		];

		$validation = $this->model->validate($input, $customrules);
		
		if ( $validation->passes() ) {
			$user = $this->_getUserById($id);
			$user->fill($input)->save();
			return $user;
		} else {
			$this->setErrors($validation->messages()->all(':message'));
			return false;
		}
	}
	
	
	public function checkPassword(array $input = array())
	{
		$id = ( isset($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		$user = $this->_getUserById($id);
		return ( \Hash::check( $input['old_password'], $user->password ) ? true : false );
	}
	
	
	public function updatePassword(array $input = array())
	{
		$id = ( isset($input['user_id']) ? $input['user_id'] : \Auth::user()->id );
		
		$customrules = [
			'firstname'			=>	'sometimes',
			'lastname'			=>	'sometimes',
			'email'				=>	'sometimes',
			'phone'				=>	'sometimes',
			'password'			=>	'required|min:6',
			'password_confirm'	=>	'required|min:6|same:password',
		];

		$validation = $this->model->validate($input, $customrules);
		
		if ( $validation->passes() ) {
			$user = $this->_getUserById($id);
			$user->fill($input)->save();
			return $user;
		} else {
			$this->setErrors($validation->messages()->all(':message'));
			return false;
		}
	}


	public function register(array $input = array())
	{
		$customrules = [
			'email'	=>	'required|email|unique:user,email',
		];

		$validation = $this->model->validate($input, $customrules);
		
		if ( $validation->passes() ) {
			$user = $this->model->create($input);
			
			$this->_sendWelcomeMail();
			
			if ( $input['via'] != 'admin' ) {
				$auth = $this->_handleLogin($user->id);
				return $auth;
			} else {
				return true;
			}
		} else {
			$this->setErrors($validation->messages()->all(':message'));
			return false;
		}
	}


	public function login(array $input = array())
	{
		if (\Auth::attempt(array('email' => $input['email'], 'password' => $input['password']), true))
		{
		    return true;
		}
		$this->setErrors([ '<i class="fa fa-meh-o fa-4"></i> Maaf, kombinasi email dan password Anda salah.' ]);
		return false;
	}


	protected function _handleLogin($id)
	{
		if (\Auth::loginUsingId($id))
		{
			return \Auth::user();
		}

		return false;
	}
	
	
	public function _getUserById($id)
	{
		$user = $this->model->find($id);
		return ( $user ? : \App::abort(404) );
	}


	protected function _sendWelcomeMail()
	{
		// logic sending email welcome
	}
}