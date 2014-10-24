<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KkstudioCreateInfopageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kkstudio_page_pages', function($table) {

			$table->increments('id');
			$table->string('slug');
			$table->text('content');
			$table->string('name');
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
		Schema::drop('kkstudio_page_pages');
	}

}
