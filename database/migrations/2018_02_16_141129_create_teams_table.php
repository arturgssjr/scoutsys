<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTeamsTable.
 */
class CreateTeamsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			// $table->unsignedInteger('category_id');
			// $table->foreign('category_id')->references('id')->on('categories');
			$table->date('foundation');			
			$table->softDeletes();
            $table->timestamps();
		});

		// Schema::table('users', function (Blueprint $table) {
		// 	$table->unsignedInteger('team_id')->nullable();	
		// 	$table->foreign('team_id')->references('id')->on('teams');
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('users', function (Blueprint $table) {
		// 	$table->dropForeign('users_team_id_foreign');
		// 	$table->dropColumn('team_id');
        // });
		Schema::drop('teams');
	}
}
