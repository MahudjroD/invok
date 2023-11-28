<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskPermissions extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_permissions', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('task_id')->nullable();
			//$table->foreign('task_id')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('user_id')->nullable();
			//$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->dateTime('added_at');
			$table->enum('access', ['read', 'update', 'full']);
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
		Schema::table('task_followers', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('task_followers');
	}
}
