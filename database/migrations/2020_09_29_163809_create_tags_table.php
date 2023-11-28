<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('color_id')->nullable();
			//$table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name', 50);
			$table->boolean('active')->nullable()->default(1);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tags');
	}
}
