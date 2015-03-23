<?php

class Order extends \Eloquent {

	protected $fillable = [];
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function driverSchedule()
	{
		return $this->hasOne('DriverSchedule', 'order_id');
	}
	
	public function orderPayment()
	{
		return $this->hasOne('OrderPayment', 'order_id');
	}
	
	public function orderSchedule()
	{
		return $this->hasOne('OrderSchedule', 'order_id');
	}
	
	public function otherStuff()
	{
		return $this->belongsTo('OtherStuff');
	}
	
	public function returnSchedule()
	{
		return $this->hasOne('ReturnSchedule', 'order_id');
	}
	
	public function stuff()
	{
		return $this->hasMany('Stuff', 'order_id');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'user_id'			=>	'exists:user,id',
			'box'				=>	'sometimes|numeric',
			'other_stuff_id'	=>	'sometimes|exists:other_stuff,id',
			'other'				=>	'sometimes|min:5',
			'status'			=>	'between:0,1,2',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}