<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sites', function(Blueprint $table)
		{
			$table->string('emailaddress')->unique();
			$table->string('link1')->nullable();
			$table->string('link2')->nullable();
			$table->string('link3')->nullable();
			$table->string('link4')->nullable();
			$table->string('link5')->nullable();
			$table->string('link6')->nullable();
			//created at, updated_at DATETIME
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
			Schema::table('sites');
	}

}
