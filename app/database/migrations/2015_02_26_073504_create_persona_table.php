<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('persona', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 40);
			$table->string('last_name', 40);
			$table->string('email', 40);
			$table->boolean('email_confirmed');
			$table->string('password', 50);
			$table->string('phone', 20)->nullable();
			$table->string('type', 40);
			$table->boolean('status');
			$table->integer('last_login')->nullable();
			$table->integer('time_created');
			$table->integer('time_updated');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('persona');
	}

}
