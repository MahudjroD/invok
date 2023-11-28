<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAttachmentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_attachments', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('task_id')->nullable();
			//$table->foreign('task_id')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('cascade');
			$table->string('mime', 200)->nullable();
			$table->string('file_path', 255)->nullable();
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
		Schema::table('task_attachments', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('task_attachments');
	}
}
