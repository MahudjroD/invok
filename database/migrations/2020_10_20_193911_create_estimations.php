<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
			$table->unsignedInteger('invoice_id')->nullable();
			//$table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
			$table->unsignedInteger('status_id')->nullable();
			//$table->foreign('status_id')->references('id')->on('status')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::table('estimations', function (Blueprint $table) {
			$table->dropSoftDeletes();
		});
		
        //Schema::dropIfExists('estimations');
    }
}
