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

function getTotalTransactions( $id = NULL, $useCode = false, $withCurrency = true )
{
	if ( $id ) {
		$key = 'id';

		if( $useCode ) {
			$key = "code";
		}

		$orderPayment = OrderPayment::where($key, $id)
			->select(['unique', 'box', 'item', 'space_credit_used']);
	} else {
		$orderPayment = OrderPayment::select([
				DB::raw("SUM(box) box"),
				DB::raw("SUM(item) item"),
				DB::raw("SUM(space_credit_used) space_credit_used")
			]);
	}

	$orderPayment = $orderPayment->first();

	$box = $orderPayment->box * Config::get('thankspace.box.price');
	$item = $orderPayment->item * Config::get('thankspace.item.price');
	$space_credit_used = $orderPayment->space_credit_used;

	$total = ( $box + $item ) - $space_credit_used;

	if ( $id ) {
		if ( $total != 0 )
		{
			$total += $orderPayment->unique;
		}
	}

	if ( $withCurrency ){
			return number_format($total, 0, '', '.');
	}

	return $total;
}

function getTotalFromCountStuff ($stuff, $withCurrency = false)
{
	$totalBiaya = array_sum( array_column( $stuff, 'subtotal' ) );

	if ( $withCurrency ) {
		return 'Rp. '. number_format( $totalBiaya ) .',-';
	}

	return $totalBiaya;
}

function getTotalFromNewInvoiceObject ( $newInvoice, $withCurrency = false)
{
	$box = $newInvoice->box * Config::get('thankspace.box.price');
	$item = $newInvoice->item * Config::get('thankspace.item.price');
	$space_credit_used = $newInvoice->space_credit_used;

	$originalTotal = $box + $item;
	$totalWithCredit = ( $box + $item ) - $space_credit_used;

	if ( $withCurrency ) {
		$originalTotal = number_format( $originalTotal ) .',-';
		$totalWithCredit = number_format( $totalWithCredit ) .',-';
	}

	return (object)[
		'originalTotal'	=> $originalTotal,
		'totalWithCredit'	=> $totalWithCredit,
	];
}

function GetLastInvoiceOrder( $id )
{
	return \OrderPayment::where(
			function( $query ){
					$query->where('status', 2)
					->orWhereNull('payment_reff');
			}
		)
		->where('order_id', $id)
		->orderBy('id', 'desc')
		->first();
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
