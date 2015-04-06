<?php

function getTotalStored($type = 'box') {
	
}

function getTotalCustomers() {
	return DB::table('user')->where('type', 'user')->count();
}

function getTotalTransactions() {
	$box	= DB::table('order')->where('type', 'box')->sum('quantity') * 50000;
	$item	= DB::table('order')->where('type', 'item')->sum('quantity') * 150000;
	return number_format($box + $item, 0, '', '.');
}