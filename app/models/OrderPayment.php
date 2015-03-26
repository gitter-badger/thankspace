<?php

class OrderPayment extends \Eloquent {

	protected $fillable = [];
	
	public function order()
	{
		return $this->belongsTo('Order');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'order_id'	=>	'exists:order,id',
			'code'		=>	'min:3|max:20',
			'method'	=>	'min:3|max:20',
			'status'	=>	'between:0,1,2',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}