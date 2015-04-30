<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStuffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_stuff', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 10)->default('box');
			$table->integer('order_id');
			$table->integer('return_schedule_id');
			$table->text('description')->nullable();
			$table->enum('status', [ 1, 2 ])->default(1);
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
		Schema::drop('order_stuff');
	}

}
