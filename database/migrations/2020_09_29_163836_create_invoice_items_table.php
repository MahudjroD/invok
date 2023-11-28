<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_items', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedInteger('invoice_id')->nullable();
			//$table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('item_id')->nullable();
			//$table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
			$table->string('item_name', 200);
			$table->string('item_description', 255);
			$table->decimal('item_price', 17, 2);
			$table->decimal('tax', 17, 2);
			$table->unsignedInteger('quantity');
			$table->decimal('total', 17, 2);
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
		Schema::table('invoice_items', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('invoice_items');
	}
}
