<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeachRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beach_ratings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('place_id');
			$table->string('device')->nullable();
			$table->integer('rating');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('beach_ratings');
	}

}
