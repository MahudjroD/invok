<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_methods', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('slug', 100)->nullable();
			$table->string('name', 100)->nullable();
			$table->string('description', 255)->nullable();
			$table->boolean('active')->nullable()->default(1);
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
		Schema::table('payment_methods', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('payment_methods');
	}
}
