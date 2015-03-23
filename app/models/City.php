<?php

class City extends \Eloquent {

	protected $fillable = [];
	
	public function country()
	{
		return $this->belongsTo('Country');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'name'			=>	'required|min:2|max:40',
			'timezone'		=>	'required|min:2|max:40',
			'country_id'	=>	'exists:country,id',
			'is_major'		=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}