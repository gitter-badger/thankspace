<?php

class OtherStuff extends \Eloquent {

	protected $fillable = [];
	
	public function order()
	{
		return $this->hasMany('Order', 'other_stuff_id');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'name'		=>	'required|min:5|max:40',
			'price'		=>	'required|numeric',
			'status'	=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}