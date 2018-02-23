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
            $table->text('address')->nullable();
            $table->text('complement')->nullable();
			$table->string('phone')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('photo')->nullable();
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
