<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{
			$table->integer('ROOM_ID', true);
			$table->integer('LOCATION_ID')->index('LOCATION_ID');
			$table->string('NAME', 20);
			$table->string('TITLE', 25);
			$table->boolean('AVAILABLE');
			$table->string('GADGETS', 225)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rooms');
	}

}
