<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_schedule', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->date('delivery_date');
			$table->string('delivery_time', 40);
			$table->date('pickup_date')->nullable();
			$table->string('pickup_time', 40)->nullable();
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
		Schema::drop('order_schedule');
	}

}
