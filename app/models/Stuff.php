<?php

class Stuff extends \Eloquent {

	protected $fillable = [];
	
	public function order()
	{
		return $this->belongsTo('Order');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'order_id'	=>	'exists:order,id',
			'name'		=>	'required|min:5|max:40',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}