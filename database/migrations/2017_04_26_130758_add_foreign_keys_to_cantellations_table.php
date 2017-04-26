<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCantellationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cantellations', function(Blueprint $table)
		{
			$table->foreign('LOCATION_ID', 'cantellations_ibfk_1')->references('LOCATION_CODE')->on('locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('USER_CODE', 'cantellations_ibfk_2')->references('USER_ID')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cantellations', function(Blueprint $table)
		{
			$table->dropForeign('cantellations_ibfk_1');
			$table->dropForeign('cantellations_ibfk_2');
		});
	}

}
