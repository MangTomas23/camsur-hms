<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stockcode')->nullable();
            $table->string('suppliercode')->nullable();
            $table->string('comment')->nullable();
            $table->string('productcode')->nullable();
            $table->string('damageqty')->nullable();
            $table->string('damagecomment')->nullable();
            $table->string('totalcost')->nullable();
            $table->dateTime('dateentry')->nullable();
            $table->string('usercode')->nullable();
            $table->string('hospitalid')->nullable();
            $table->string('consumed')->nullable();
            $table->string('availablestock')->nullable();
            $table->string('quantity')->nullable();
            $table->string('returnstat')->nullable();
            $table->integer('sync')->nullable();
            $table->text('status')->nullable();
            $table->string('supplierprice')->nullable();
            $table->string('saleprice')->nullable();
            $table->string('unitcode')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
