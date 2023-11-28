<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('url',255)->nullable();
            $table->string('name',200)->nullable();
			$table->string('permission',200)->nullable();
            $table->string('i18n',200)->nullable();
            $table->string('icon', 200)->nullable();
			$table->string('tag', 200)->nullable();
			$table->string('tagcustom', 255)->nullable();
            $table->string('navheader')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
			$table->integer('lft')->unsigned()->nullable();
			$table->integer('rgt')->unsigned()->nullable();
			$table->integer('depth')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
