<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedBigInteger('author_id')->nullable();
			//$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedInteger('status_id')->nullable();
			//$table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedInteger('customer_id')->nullable();
			//$table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
			$table->string('name', 200)->nullable();
			$table->string('description', 255)->nullable();
			$table->dateTime('start_date')->nullable();
			$table->dateTime('deadline')->nullable();
			$table->softDeletes('deleted_at', 0);
			$table->boolean('draft')->nullable();
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
		Schema::table('projects', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('projects');
	}
}
