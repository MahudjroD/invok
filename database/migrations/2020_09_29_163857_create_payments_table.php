<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('invoice_id')->nullable();
			//$table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('customer_id')->nullable();
			//$table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('payment_method_id')->nullable();
			//$table->foreign('payment_method_id')->references('id')->on('payment_methods')->onUpdate('cascade')->onDelete('cascade');
			$table->date('date_payment');
			$table->decimal('amount', 17, 2);
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
		Schema::table('payments', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
	//	Schema::dropIfExists('payments');
	}
}
