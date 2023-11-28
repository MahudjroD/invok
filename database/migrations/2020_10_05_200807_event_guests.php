<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventGuests extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_guests', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('event_id')->nullable();
			//$table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('author_id')->nullable();
			//$table->foreign('author_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->dateTime('added_at');
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
		Schema::table('event_guests', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('event_guests');
	}
}
