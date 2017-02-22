<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumeStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consume_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consumecode')->nullable();
            $table->integer('status')->nullable();
            $table->string('productcode')->nullable();
            $table->text('remarks')->nullable();
            $table->string('supplierdsic')->nullable();
            $table->dateTime('dateentry')->nullable();
            $table->string('hospitalid')->nullable();
            $table->integer('sync')->nullable();
            $table->text('usercode')->nullable();
            $table->text('discountpercentage')->nullable();
            $table->text('contactno')->nullable();
            $table->text('percentage')->nullable();
            $table->text('amount')->nullable();
            $table->text('discountedamount')->nullable();
            $table->integer('hospital_id')->unsigned()->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('set null');
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
        Schema::dropIfExists('consume_stocks');
    }
}
