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

			return $auth;
		} else {
			$this->setErrors($validation->messages()->all(':message'));
			return false;
		}
	}


	protected function _handleLogin($id)
	{
		if (\Auth::loginUsingId($id))
		{
			return \Auth::user();
		}

		return false;
	}
}