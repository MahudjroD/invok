<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colors', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 50)->nullable()->comment("Use bootstrap classes name");
			$table->string('class', 50)->nullable()->comment("danger, success, info, warning, secondary,light, dark");
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
		Schema::dropIfExists('colors');
	}
}
