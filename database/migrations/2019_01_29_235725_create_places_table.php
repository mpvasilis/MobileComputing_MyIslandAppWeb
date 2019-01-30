<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('places', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 50)->unique('unique_name');
			$table->integer('category');
			$table->text('image', 65535);
			$table->string('address', 100)->nullable();
			$table->string('phone', 25)->nullable()->default('-');
			$table->string('website', 100)->nullable()->default('-');
			$table->text('description', 65535);
			$table->text('description_long', 65535)->nullable();
			$table->float('lat', 10, 0);
			$table->float('lng', 10, 0);
			$table->bigInteger('last_update')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('places');
	}

}
