<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectFollowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('project_followers', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('project_id')->nullable();
			//$table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('user_id')->nullable();
			//$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->dateTime('added_at');
			$table->enum('access',['read','update','full']);
			$table->unsignedBigInteger('added_by')->nullable();
			//$table->foreign('added_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::table('project_followers', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('project_followers');
	}
}
