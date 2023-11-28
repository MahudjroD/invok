<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Status extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('status', function (Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->enum('name', [
				'not started', 'paid', 'mark as in progress', 'mark as testing',
				'mark as awating feedback', 'mark as complete', 'cancelled', 'in progress', 'on hold', 'finished', 'unpaid','partially paid','approved','declined','draft','sent','expired'
			]);
			$table->enum('related_to', ['tasks', 'invoices', 'projects','estimations']);
			$table->boolean('active')->nullable()->default(1);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('status');
	}
}
