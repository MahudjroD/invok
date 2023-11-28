<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('task_favorites', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('task_id')->nullable();
			$table->unsignedBigInteger('user_id')->nullable();
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
		Schema::table('task_favorites', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('task_attachments');
    }
}
