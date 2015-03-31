<?php namespace Thankspace\Repo;

class UserRepo extends BaseRepo
{
	
	public function __construct(\User $user)
	{
		$this->model = $user;
	}


	public function register(array $input = array())
	{
		$customrules = [
			'email'	=>	'required|unique:user,email',
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
		$this->setErrors(['Kombinasi email dan password']);
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


	protected function _sendWelcomeMail()
	{
		// logic sending email welcome
	}
}