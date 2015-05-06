<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_gallery', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->string('filename', 40);
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
		Schema::drop('order_gallery');
	}

}
