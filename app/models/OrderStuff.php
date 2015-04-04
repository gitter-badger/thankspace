<?php

class OrderStuff extends \Eloquent {

	protected $fillable = [];
	
	protected $table = 'order_stuff';
	
	public function order()
	{
		return $this->belongsTo('Order');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'order_id'		=>	'exists:order,id',
			'description'	=>	'required|min:3',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}