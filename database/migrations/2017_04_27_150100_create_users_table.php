<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('USER_ID', true);
			$table->string('FIRST_NAME', 30);
			$table->string('LAST_NAME', 30);
			$table->string('TITLE', 30)->nullable();
			$table->integer('LOCATION_ID')->index('LOCATION_ID');
			$table->string('EMAIL', 45)->unique('EMAIL_2');
			$table->string('PASSWORD', 20);
			$table->boolean('IS_ACTIVE');
			$table->primary(['USER_ID','EMAIL']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
