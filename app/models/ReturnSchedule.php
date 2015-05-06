<?php

class ReturnSchedule extends \Eloquent {

	protected $fillable = ['order_id', 'return_date', 'return_time', 'other_address', 'status'];
	
	protected $table = 'return_schedule';
	
	public function getDates()
	{
		return [ 'return_date' ];
	}

	public function getDateFormat()
	{
		return 'Y-m-d';
	}
	
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
			'other_address'	=>	'sometimes|required|min:10',
			'status'		=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}