<?php

class ReturnSchedule extends \Eloquent {

	protected $fillable = ['order_id', 'return_date', 'return_time', 'status'];
	
	protected $table = 'return_schedule';
	
	public function order()
	{
		return $this->belongsTo('Order');
	}

	public function stuffs()
	{
		return $this->hasMany('OrderStuff');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'order_id'		=>	'exists:order,id',
			'return_date'	=>	'required|date_format:Y-m-d',
			'return_time'	=>	'required',
			'status'		=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}