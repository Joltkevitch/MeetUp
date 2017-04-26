<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCantellationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cantellations', function(Blueprint $table)
		{
			$table->integer('CANCEL_ID', true);
			$table->integer('LOCATION_ID')->index('LOCATION_ID');
			$table->integer('USER_CODE')->index('USER_CODE');
			$table->timestamp('CANCEL_DATE')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('NOTES', 150)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cantellations');
	}

}
