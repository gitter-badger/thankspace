<?php

function getTotalStored($type = 'box') {
	$total = DB::table('order')
				->where('order.type', $type)
				->join('order_schedule', function($join)
				{
					$join->on('order.id', '=', 'order_schedule.order_id')
						->where('order_schedule.status', '=', 1);
				})
				->sum('order.quantity');
	
	return $total;
}

function getTotalCustomers() {
	return DB::table('user')->where('type', 'user')->count();
}

function getTotalTransactions() {
	$box	= DB::table('order')
				->where('type', 'box')
				->join('order_payment', function($join)
				{
					$join->on('order.id', '=', 'order_payment.order_id')
						->where('order_payment.status', '=', 2);
				})
				->sum('quantity') * 50000;
	$item	= DB::table('order')
				->where('type', 'item')
				->join('order_payment', function($join)
				{
					$join->on('order.id', '=', 'order_payment.order_id')
						->where('order_payment.status', '=', 2);
				})
				->sum('quantity') * 150000;
				
	return number_format($box + $item, 0, '', '.');
}


function makeFormatTime($y, $m, $d)
{
	return \Carbon\Carbon::createFromDate($y, $m, $d)->format('l, jS F Y');
}

function generate_password( $length = 8 ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$password = substr( str_shuffle( $chars ), 0, $length );
	return $password;
}


/**
 * Calculating price by type
 * 
 * @param  string $type [box|item]
 * @param  numeric $qty  [description]
 * @param  bool $withCurrency
 * @return string
 */
function calcPrice($type, $qty, $withCurrency = false)
{
	$price = Config::get("thankspace.$type.price") * $qty;
	if ($withCurrency) {
		return 'Rp. '. number_format($price) .',-';
	}
	return $price;
}