<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxes', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 100)->nullable();
			$table->float('rate', 100);
			$table->enum('type', ['fix', 'percentage']);
			$table->softDeletes('deleted_at', 0);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('taxes', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('taxes');
	}
}
