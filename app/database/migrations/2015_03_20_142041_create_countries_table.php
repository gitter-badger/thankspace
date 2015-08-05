<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 40);
			$table->string('code', 5)->nullable();
			$table->string('currency', 5)->nullable();
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
		Schema::drop('countries');
	}

}
