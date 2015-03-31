<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 10)->default('user');
			$table->string('firstname', 40);
			$table->string('lastname', 40);
			$table->string('email', 40);
			$table->enum('email_confirmed', [ 0, 1 ])->default(0);
			$table->string('password');
			$table->integer('city_id')->nullable();
			$table->text('address');
			$table->enum('gender', [ 'm', 'f' ])->default('m');
			$table->string('phone', 20)->nullable();
			$table->string('remember_token')->nullable();
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
		Schema::drop('user');
	}

}