<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCategoryablesTable.
 */
class CreateCategoryablesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoryables', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('category_id');
			$table->nullableMorphs('categoryable');
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
		Schema::drop('categoryables');
	}
}
