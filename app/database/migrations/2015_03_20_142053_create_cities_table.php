<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 40);
			$table->integer('country_id');
			$table->string('timezone', 40)->nullable();
			$table->float('lat')->nullable();
			$table->float('lng')->nullable();
			$table->boolean('is_major');
			$table->enum('status', [ 0, 1 ])->default(1);
			$table->integer('time_created');
			$table->integer('time_updated');
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
		Schema::drop('cities');
	}

}
