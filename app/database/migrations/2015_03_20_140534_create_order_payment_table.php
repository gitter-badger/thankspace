<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_payment', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->string('code', 20);
			$table->string('method', 20)->default('bank');
			$table->text('message')->nullable();
			$table->enum('status', [ 0, 1 ])->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_payment');
	}

}
