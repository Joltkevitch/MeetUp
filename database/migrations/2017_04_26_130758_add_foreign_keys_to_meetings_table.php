<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMeetingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('meetings', function(Blueprint $table)
		{
			$table->foreign('LOCATION_ID', 'meetings_location_2')->references('LOCATION_CODE')->on('locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ROOM_CODE', 'meetings_rooms_3')->references('ROOM_ID')->on('rooms')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('USER_CODE', 'meetings_users_1')->references('USER_ID')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('meetings', function(Blueprint $table)
		{
			$table->dropForeign('meetings_location_2');
			$table->dropForeign('meetings_rooms_3');
			$table->dropForeign('meetings_users_1');
		});
	}

}
