<?php namespace Thankspace\Repo;

class UserRepo extends BaseRepo
{
	
	public function __construct(\User $user)
	{
		$this->model = $user;
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


	public function register(array $input = array())
	{
		$customrules = [
			'email'	=>	'required|email|unique:user,email',
		];

		$validation = $this->model->validate($input, $customrules);
		
		if ( $validation->passes() ) {
			$user = $this->model->create($input);
			$auth = $this->_handleLogin($user->id);

			$this->_sendWelcomeMail();

			return $auth;
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