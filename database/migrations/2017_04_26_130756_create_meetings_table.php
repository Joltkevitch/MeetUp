<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeetingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetings', function(Blueprint $table)
		{
			$table->integer('MEETING_NUMBER', true);
			$table->integer('USER_CODE')->index('meetings_users_1');
			$table->integer('LOCATION_ID')->index('meetings_location_2');
			$table->integer('ROOM_CODE')->index('meetings_rooms_3');
			$table->date('MEETING_DATE');
			$table->time('TIME_FROM');
			$table->time('TIME_TO');
			$table->string('USERS_ATT', 150);
			$table->string('NOTES', 150);
			$table->boolean('COMPLETE');
			$table->string('TYPE', 30);
			$table->string('DEPARTMENT', 30)->nullable();
			$table->primary(['MEETING_NUMBER','MEETING_DATE','TIME_FROM','TIME_TO']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meetings');
	}

}
