<?php

class OrderSchedule extends \Eloquent {

	protected $fillable = ['order_id', 'delivery_date', 'delivery_time', 'pickup_date', 'pickup_time', 'status'];
	
	protected $table = 'order_schedule';


	public function getDates()
	{
		return ['delivery_date', 'pickup_date'];
	}

	public function getDateFormat()
	{
		return 'Y-m-d';
	}

	
	public function order()
	{
		return $this->belongsTo('Order');
	}
	
	public static function validate($input, $customrules = '')
	{
		$rules = [
			'order_id'		=>	'exists:order,id',
			'delivery_date'	=>	'required|date_format:Y-m-d',
			'delivery_time'	=>	'required|min:5|max:40',
			'pickup_date'	=>	'sometimes|date_format:Y-m-d',
			'pickup_time'	=>	'sometimes|min:5|max:40',
			'status'		=>	'between:0,1',
		];
		
		if (!empty($customrules)) $rules = $rules + $customrules;
		
		return Validator::make($input, $rules);
	}
	
}