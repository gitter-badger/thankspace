<?php

class OrderGallery extends \Eloquent {

	protected $fillable = [ 'order_id', 'filename', 'status' ];
	
	protected $table = 'order_gallery';
	
	public function order()
	{
		return $this->belongsTo('Order');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'order_id'		=>	'exists:order,id',
			'filename'		=>	'required|min:3',
			'status'		=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}