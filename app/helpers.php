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

	$total = ( $box + $item );
	$order = Order::find($id);
	if ($order) {
		$total -= $order->space_credit_used;
	};

	if ( $id ) {
		$code = DB::table('order_payment')->where('order_id', $id)->first();
		$ucode = $code->unique;
	} else {
		$ucode = 0;
	}

	$grand_total = $total + $ucode;

	return number_format($grand_total, 0, '', '.');
}


function makeFormatTime($y, $m = null, $d = null)
{
	if ($m == null and $d == null)
	{
		$date = $y;
		return \Carbon\Carbon::parse($date)->format('l, jS F Y');
	}
	return \Carbon\Carbon::createFromDate($y, $m, $d)->format('l, jS F Y');
}

function generate_random_code( $length = 8 ) {
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


function getCities()
{
	$result = [ '' => 'Select City' ];
	$cities = City::select('id', 'name', 'status')->where('status', 1)->get();
	foreach($cities as $c)
	{
		$result[$c['id']] = $c['name'];
	}
	return $result;
}

function getCustomerSpaceCredit()
{
	return DB::table('space')
		->select(DB::raw("ifnull(sum(if(type = 'debet',-abs(nominal),nominal)),0)as `jumlah`"))
		->where('user_id',Auth::user()->id)
		->get()[0]->jumlah;
}

function getCustomerJoinReferral()
{
	return DB::table('user')
		->where('signup_ref',Auth::user()->ref_code)
		->count();
}
