<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumOrderPayment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_payment', function(Blueprint $table)
		{
			$table->integer('box')->default(0);
			$table->integer('item')->default(0);
			$table->integer('space_credit_used')->default(0);
			$table->timestamp('used_start')->nullable();
			$table->string('payment_reff')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order_payment', function(Blueprint $table)
		{
			$table->dropColumn('box');
			$table->dropColumn('item');
			$table->dropColumn('space_credit_used');
			$table->dropColumn('used_start');
			$table->dropColumn('payment_reff');
		});
	}

}
