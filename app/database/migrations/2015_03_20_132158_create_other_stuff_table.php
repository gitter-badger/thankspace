<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherStuffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('other_stuff', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 40);
			$table->double('price', 20, 2)->default(0);
			$table->enum('status', [ 0, 1 ])->default(1);
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
		Schema::drop('other_stuff');
	}

}
