<?php namespace Thankspace\Repo;

use Illuminate\Support\Facades\Redirect;

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

		$input['type'] 			= (isset($input['type'])) ? $input['type'] : 'user';
		$input['via'] 			= (isset($input['via'])) ? $input['via'] : 'register';
		$input['signup_ref']= (isset($input['signup_ref'])) ? $input['signup_ref'] : null;
		$input['ref_code']	= $this->_refCodeGenerator();

		$validation = $this->model->validate($input, $customrules);

		if ( $validation->passes() ) {
			$user = $this->model->create($input);

			$this->_sendWelcomeMail($input);

			if( $input['signup_ref'] != null ) {
				\Space::create([
					'user_id'	=> $user->id,
					'type'		=> 'credit',
					'nominal'	=> \Config::get('thankspace.space_credit.signup'),
					'keterangan'=> 'Space Credit for sign up from link referral',
				]);
			}

			$this->_sendAdminNewCustomerMail($user->id);

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
	 * Get invoice detail
	 *
	 * @param  integer $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function getInvoiceDetail($id)
	{
		return \Order::with('orderPayment', 'orderSchedule', 'orderStuff', 'user')->find($id);
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

	protected function _sendAdminNewCustomerMail( $user_id )
	{
		$user = \User::with('city')->find($user_id);

		$to = [
			'email'	=>	'ThankSpace Support',
			'name'	=>	'support@thankspace.com',
		];

		$data = [ 'user' => $user ];

		\Mail::send('emails.admin-new-user', $data, function($message) use ($to)
		{
			$message->to($to['email'], $to['name'])
					->subject('[ThankSpace] New Customer');
		});
	}


	/**
	 * For assign delivery schedule for driver
	 *
	 * @param  array  $input
	 * @return mix \Illuminate\Database\Eloquent\Model|false
	 */
	public function assignDelivery(array $input = array())
	{
		if ( isset($input['order_id']) )
		{
			$order = $input['order_id'];
			for ($i = 0; $i < count($order); $i++)
			{
				\DeliverySchedule::create([
					'order_id'	=> $order[$i],
					'user_id'	=> \Auth::user()->id
				]);
			}
			return true;
		} else {
			$this->setErrors([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No order selected',
					'type'	=> 'error',
				]
			]);
			return false;
		}
	}

	/**
	 * For assign return schedule for driver
	 *
	 * @param  array  $input
	 * @return mix \Illuminate\Database\Eloquent\Model|false
	 */
	public function assignReturn(array $input = array())
	{
		if ( isset($input['return_schedule_id']) )
		{
			\ReturnSchedule::whereIn('id', $input['return_schedule_id'])->update([ 'user_id' => \Auth::user()->id ]);
			return true;
		} else {
			$this->setErrors([ 'message' =>
				[
					'ico'	=> 'meh',
					'msg'	=> 'No schedule selected',
					'type'	=> 'error',
				]
			]);
			return false;
		}
	}

	/**
	* Referral Repo
	*/

	public function _refCodeGenerator()
	{
		$cek = 1;
		$ref_code = '';
		while ($cek) {
			$ref_code = strtolower(str_random(10));
			$cek = \User::where('ref_code',$ref_code)->count();
		}

		return $ref_code;
	}

	public function saveRefCodeCustomer($data = null)
	{
		$data = isset($data) ? $data : ['ref_code' => $this->_refCodeGenerator()];
		$user = $this->_getUserById(\Auth::user()->id);
		$user->fill($data)->save();
		return $user;
	}

	public function getCustomerSpaceCredit($user_id = null)
	{
		$user_id = isset( $user_id ) ? $user_id : \Auth::user()->id;
		return \DB::table('space')
			->select(\DB::raw("ifnull(sum(if(type = 'debet',-abs(nominal),nominal)),0)as `jumlah`"))
			->where('user_id', $user_id)
			->get()[0]->jumlah;
	}

	public function getCustomerJoinReferral()
	{
		return \DB::table('user')
			->where('signup_ref',\Auth::user()->ref_code)
			->count();
	}

	public function getUserHasCommison($user_ids)
	{
		return \DB::table('user')
			->select(['user.id', 'user.email', 'user.signup_ref', \DB::raw("count(order.id)as `jumlah`"),
				'user_temp.email as ref_code_email', 'user_temp.id as ref_code_user_id',
				'user_temp.firstname as ref_code_firstname', 'user_temp.lastname as ref_code_lastname'])
			->join('order', 'user.id', '=', 'order.user_id')
			->join('user as user_temp', function($join) {
				$join->on('user.signup_ref', '=', 'user_temp.ref_code');
			})
			->where('user.type','user')
			->whereNotNull('user.signup_ref')
			->whereIn('user.id',$user_ids)
			->groupBy('user.id')
			->having('jumlah', '=', 1)
			->get();
	}

	public function change_ref(array $input = array())
	{
		$customrules = [
			'firstname'	=>	'sometimes',
			'lastname'	=>	'sometimes',
			'email'		=>	'sometimes',
			'phone'		=>	'sometimes',
			'password'	=> 	'sometimes',
			'ref_code'	=> 	'required|alpha_num|min:5|max:10|unique:user'
		];

		$validation = $this->model->validate($input, $customrules);

		if ($validation->fails()) {
			$this->setErrors($validation->messages()->all(':message'));
			return false;
		}

		return $this->saveRefCodeCustomer($input);
	}
}
