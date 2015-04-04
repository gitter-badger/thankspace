<?php

class Country extends \Eloquent {

	protected $fillable = [];
	
	protected $table = 'countries';
	
	public function city()
	{
		return $this->hasMany('City', 'country_id');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'name'		=>	'required|min:2|max:40',
			'code'		=>	'required|max:5',
			'currency'	=>	'required|max:5',
			'is_major'	=>  'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}