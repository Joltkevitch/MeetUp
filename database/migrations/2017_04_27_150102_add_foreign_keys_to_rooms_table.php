<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rooms', function(Blueprint $table)
		{
			$table->foreign('LOCATION_ID', 'rooms_ibfk_1')->references('LOCATION_CODE')->on('locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rooms', function(Blueprint $table)
		{
			$table->dropForeign('rooms_ibfk_1');
		});
	}

}
