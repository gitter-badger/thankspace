<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function(Blueprint $table)
		{
			$table->string('ref_code')->unique()->nullable();
			$table->string('signup_ref')->unique()->nullable();
			$table->enum('ref_code_editable', [1, 0])->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user', function(Blueprint $table)
		{
			$table->dropColumn('ref_code');
			$table->dropColumn('signup_ref');
			$table->dropColumn('ref_code_editable');
		});
	}

}
