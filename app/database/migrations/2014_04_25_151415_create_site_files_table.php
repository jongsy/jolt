<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('content', 10000);
			$table->integer('site_id')->unsigned();
			$table->string('mime', 255);
			$table->integer('parent_id')->unsigned();
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
		Schema::drop('site_files');
	}

}
