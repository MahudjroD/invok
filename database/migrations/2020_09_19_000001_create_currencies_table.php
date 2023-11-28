<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currencies', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('code', 3)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('html_entity', 30)->nullable();
			$table->string('symbol', 5)->nullable();
			$table->boolean('in_left')->nullable()->default(1);
			$table->unsignedInteger('decimal_places');
			$table->string('decimal_separator', 5)->nullable();
			$table->string('thousand_separator', 5)->nullable();
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
		Schema::dropIfExists('currencies');
	}
}
