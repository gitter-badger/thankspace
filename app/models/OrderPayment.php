<?php

class OrderPayment extends \Eloquent {

	protected $fillable = ['order_id', 'code', 'method', 'message', 'status'];
	
	protected $table = 'order_payment';


	public function setCodeAttribute($value)
	{
		$this->attributes['code'] = 'TH'. substr(date('Y'), 2) . $this->attributes['order_id'];
	}
	
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