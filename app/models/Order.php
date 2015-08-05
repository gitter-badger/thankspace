<?php

class Order extends \Eloquent {

	protected $fillable = ['user_id', 'quantity'];
	
	protected $table = 'order';
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function deliverySchedule()
	{
		return $this->hasOne('DeliverySchedule', 'order_id');
	}
	
	public function orderGallery()
	{
		return $this->hasMany('OrderGallery', 'order_id');
	}
	
	public function orderPayment()
	{
		return $this->hasOne('OrderPayment', 'order_id');
	}
	
	public function orderSchedule()
	{
		return $this->hasOne('OrderSchedule', 'order_id');
	}
	
	public function orderStuff()
	{
		return $this->hasMany('OrderStuff', 'order_id');
	}
	
	public function returnSchedule()
	{
		return $this->hasOne('ReturnSchedule', 'order_id');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'user_id'		=>	'exists:user,id',
			'type'			=>	'min:3|max:10',
			'quantity'		=>	'required|numeric',
			'description'	=>	'sometimes|min:3',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}