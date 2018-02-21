<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDetailablesTable.
 */
class CreateDetailablesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detailables', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('detail_id');
			$table->nullableMorphs('detailable');
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
		Schema::drop('detailables');
	}
}
