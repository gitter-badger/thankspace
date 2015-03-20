<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('box')->nullable();
			$table->integer('other_stuff_id')->nullable();
			$table->text('other')->nullable();
			$table->enum('status', [ 0, 1, 2 ])->default(0);
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
		Schema::drop('order');
	}

}
