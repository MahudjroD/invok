<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedBigInteger('author_id')->nullable();
			//$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedInteger('company_id')->nullable();
			//$table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name', 250)->nullable();
			$table->string('phone_number', 50)->nullable();
			$table->string('email', 150)->nullable();
			$table->string('address', 255)->nullable();
			$table->string('city', 150)->nullable();
			$table->string('country_code', 2)->nullable();
			//->references('code')->on('countries')->onDelete('cascade')->onUpdate('cascade');
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
		Schema::table('customers', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('customers');
	}
}
