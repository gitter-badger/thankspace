<?php

function getTotalStored($type = 'box') {
	$total = DB::table('order')
				->join('order_schedule', function($join)
				{
					$join->on('order.id', '=', 'order_schedule.order_id')
						->where('order_schedule.status', '=', 1);
				})
				->join('order_stuff', function($join) use ($type)
				{
					$join->on('order.id', '=', 'order_stuff.order_id')
						->where('order_stuff.type', '=', $type);
				})
				->count();
	
	return $total;
}

function getTotalCustomers() {
	return DB::table('user')->where('type', 'user')->count();
}

function getTotalTransactions( $id = NULL ) {
	
	$opr = ( $id ? '<=' : '=' );
	
	$box = DB::table('order');
	
	if ( $id ) {
		$box = $box->where('order.id', $id);
	}
	
	$box = $box->join('order_payment', function($join) use ($opr)
				{
					$join->on('order.id', '=', 'order_payment.order_id')
						->where('order_payment.status', $opr, 2);
				})
				->join('order_stuff', function($join)
				{
					$join->on('order.id', '=', 'order_stuff.order_id')
						->where('order_stuff.type', '=', 'box');
				})
				->count() * Config::get('thankspace.box.price');
	
	$item = DB::table('order');
	
	if ( $id ) {
		$item = $item->where('order.id', $id);
	}
	
	$item = $item->join('order_payment', function($join) use ($opr)
				{
					$join->on('order.id', '=', 'order_payment.order_id')
						->where('order_payment.status', $opr, 2);
				})
				->join('order_stuff', function($join)
				{
					$join->on('order.id', '=', 'order_stuff.order_id')
						->where('order_stuff.type', '=', 'item');
				})
				->count() * Config::get('thankspace.item.price');
	
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