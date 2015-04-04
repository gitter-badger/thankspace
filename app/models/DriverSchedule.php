<?php

class DriverSchedule extends \Eloquent {

	protected $fillable = [];
	
	protected $table = 'driver_schedule';
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function order()
	{
		return $this->belongsTo('Order');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'user_id'	=>	'exists:user,id',
			'order_id'	=>	'exists:order,id',
			'type'		=>	'min:3|max:10',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}