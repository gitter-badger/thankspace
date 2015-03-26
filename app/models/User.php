<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
     * Get fullname attribute mutators
     * 
     * @return string
     */
    public function getFullnameAttribute()
    {
    	return $this->attributes['firstname'] .' '. $this->attributes['lastname'];
    }

	
	public function city()
	{
		return $this->belongsTo('City');
	}
	
	public function order()
	{
		return $this->hasMany('Order', 'user_id');
	}
	
	public function schedule()
	{
		return $this->hasMany('DriverSchedule', 'user_id');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'type'		=>	'sometimes|in:admin,driver,user',
			'firstname'	=>	'required|min:5|max:40',
			'lastname'	=>	'required|min:5|max:40',
			'email'		=>	'required|email|max:40',
			'password'	=>	'required|min:6',
			'city_id'	=>	'sometimes|exists:cities,id',
			'address'	=>	'required|min:10',
			'gender'	=>	'sometimes|in:m,f',
			'phone'		=>	'required|max:20',
			'status'	=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}

}