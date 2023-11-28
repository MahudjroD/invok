<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('code', 2)->unique();
			$table->string('name', 100)->nullable();
			$table->string('tld', 10)->nullable();
			$table->string('continent_code', 2)->nullable();
			$table->string('currency_code', 3)->nullable();
			//->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
			$table->string('int_calling_code', 20)->nullable();
			$table->string('languages', 100)->nullable();
			$table->boolean('active')->nullable()->default(1);
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
		Schema::dropIfExists('countries');
	}
}
