<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedBigInteger('author_id')->nullable()->comment = "User Id";
			//$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade')->comment = "User Id";
			$table->unsignedInteger('category_id')->nullable();
			//$table->foreign('category_id')->references('id')->on('event_categories')->onDelete('cascade')->onUpdate('cascade');
			$table->string('description',255)->nullable();
			$table->string('subject', 200)->nullable();
			$table->string('location', 255)->nullable();
			$table->dateTime('started_date');
			$table->dateTime('end_date');	
			$table->boolean('period_as_busy')->nullable()->default(0);
			$table->integer('reminded_before');
			$table->enum('reminded_before_type',['minutes','hours','days','weeks','months','years']);
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
		Schema::table('events', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('events');
	}
}
