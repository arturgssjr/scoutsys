<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDetailsTable.
 */
class CreateDetailTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('details', function(Blueprint $table) {
            $table->increments('id');
            $table->text('address');
			$table->string('phone');
			$table->string('city');
			$table->string('state');
            $table->string('zipcode');
            $table->string('photo');
            $table->nullableMorphs('detailsable');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('details');
	}
}
