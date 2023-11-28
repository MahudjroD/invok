<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 250)->nullable();
			$table->string('logo_path', 250)->nullable();
			$table->string('email', 150)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('city', 150)->nullable();
			$table->string('country_code', 2)->nullable();
			//->references('code')->on('countries')->onUpdate('cascade')->onDelete('cascade');
			$table->softDeletes('deleted_at', 0);
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
		Schema::table('companies', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('companies');
	}
}
