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
			$table->text('other_address')->nullable();
			$table->integer('city_id')->nullable();
			
			// 0 : alamatnya berbeda, atau belom di konfirmasi admin
			// 1 : alamatnya sama, atau sudah di konfirmasi admin
			// 2 : beres
			$table->enum('status', [ 0, 1, 2 ]); 
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
