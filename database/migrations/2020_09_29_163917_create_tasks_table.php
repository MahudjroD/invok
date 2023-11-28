<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedBigInteger('author_id')->nullable();
			$table->unsignedInteger('project_id')->nullable();
			//$table->foreign('author_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->unsignedInteger('color_id')->nullable();
			$table->unsignedInteger('status_id')->nullable();
			//$table->foreign('color_id')->references('id')->on('colors')->onUpdate('cascade')->onDelete('cascade');
			$table->string('subject', 200)->nullable();
			$table->integer('lft')->unsigned()->nullable();
			$table->integer('rgt')->unsigned()->nullable();
			$table->unsignedBigInteger('time')->nullable();
			$table->string('description',255)->nullable();
			$table->boolean('favorite')->nullable()->default(0);
			$table->dateTime('start_date')->nullable();
			$table->dateTime('due_date')->nullable();
			$table->enum('priority', ['low', 'high', 'medium', 'urgent'])->nullable();;
			$table->enum('recurrent_every', [
				'disable',
				'1-week',
				'2-weeks',
				'1-month',
				'2-two months',
				'3-year',
				'custom',
			])->nullable();
			$table->unsignedBigInteger('assigned_to')->nullable();
			$table->string('recurrent_custom', 255)->nullable();
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
		Schema::table('tasks', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('tasks');
	}
}
