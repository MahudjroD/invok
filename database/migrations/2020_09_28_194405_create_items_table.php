<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name', 200);
			$table->string('description', 255)->nullable();
			$table->enum('type', ['product', 'service']);
			$table->decimal('price', 17, 2);
			$table->boolean('active')->nullable()->default(1);
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
		Schema::table('items', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('items');
	}
}
