<?php

class DeliverySchedule extends \Eloquent {

	protected $fillable = [ 'user_id', 'order_id' ];
	
	protected $table = 'delivery_schedule';
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function order()
	{
		return $this->belongsTo('Order');
	}

	public function orderSchedule()
	{
		return $this->belongsTo('OrderSchedule');
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