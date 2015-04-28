<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('return_schedule', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('order_id');
			$table->date('return_date');
			$table->string('return_time', 40);
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
		Schema::drop('return_schedule');
	}

}
