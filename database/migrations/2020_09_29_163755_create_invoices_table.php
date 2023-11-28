<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->unsignedBigInteger('author_id')->nullable();
			//$table->foreign('author_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedBigInteger('agent_id')->nullable();
			//$table->foreign('agent_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('customer_id')->nullable();
			//$table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('project_id')->nullable();
			//$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
			$table->string('currency_code')->nullable();
				//->references('code')->on('currencies')->onDelete('cascade')->onUpdate('cascade');
			$table->string('invoice_ref',10);
			$table->decimal('tax', 17, 2);
			$table->date('date_issue');
			$table->date('date_due');
			$table->decimal('amount', 17, 2);
			$table->decimal('discount',20);
			$table->enum('status', ['paid', 'unpaid', 'partially paid']);
			$table->boolean('is_estimation')->nullable();
			$table->string('message',255);
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
		Schema::table('companies', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		//Schema::dropIfExists('invoices');
		
	}
}
