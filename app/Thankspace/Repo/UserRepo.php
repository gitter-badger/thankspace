<?php namespace Thankspace\Repo;

class UserRepo extends BaseRepo
{
	
	public function __construct(\User $user)
	{
		$this->model = $user;
	}
	
	
	public function getMemberList()
	{
		$user = $this->model->where('status', 1)->paginate(20);
		
		if ( $user ) {
			return $user;
		} else {
			return false;
		}
	}
	
	
	public function deleteUser($id)
	{
		$user = $this->_getUserById($id);
		
		if ( $user ) {
			\Order::where('user_id', $user->id)->update([ 'status' => 0 ]);
			$user->update([ 'status' => 0 ]);
			return true;
		} else {
			$this->setErrors([ 'Whoops, something went wrong. Please try again' ]);
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

		$input['type'] = (isset($input['type'])) ? $input['type'] : 'user';
		$input['via'] = (isset($input['via'])) ? $input['via'] : 'register';

		$validation = $this->model->validate($input, $customrules);
		
		if ( $validation->passes() ) {
			$user = $this->model->create($input);
			
			$this->_sendWelcomeMail($input);
			
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
		if (\Auth::attempt([ 'email' => $input['email'], 'password' => $input['password'], 'status' => 1 ], true))
		{
		    return true;
		}
		$this->setErrors([ '<i class="fa fa-meh-o fa-4"></i> Maaf, kombinasi email dan password Anda salah.' ]);
		return false;
	}


	/**
	 * Get order detail
	 * 
	 * @param  integer $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getStorageDetail($id)
	{
		return \Order::with('orderPayment', 'orderSchedule', 'orderStuff')->find($id);
	}


	/**
	 * Get order stuff
	 * 
	 * @param  integer $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getStorageStuff($order_id)
	{
		return \OrderStuff::where('order_id', $order_id)->get();
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


	protected function _sendWelcomeMail(array $input = array())
	{
		// logic sending email welcome
		$to = [
			'email'		=>	$input['email'],
			'fullname'	=>	ucfirst($input['firstname']) .' '. ucfirst($input['lastname']),
		];
		
		\Mail::send('emails.welcome', $input, function($message) use ($to)
		{
			$message->to($to['email'], $to['fullname'])
					->subject('[ThankSpace] Selamat datang di ThankSpace');
		});
	}
}