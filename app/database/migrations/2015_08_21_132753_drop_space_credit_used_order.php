<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSpaceCreditUsedOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order', function(Blueprint $table)
		{
			$table->dropColumn('space_credit_used');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order', function(Blueprint $table)
		{
			$table->integer('space_credit_used');
		});
	}

}
