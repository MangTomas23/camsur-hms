<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('productcode')->nullable();
            $table->string('productdescription')->nullable();
            $table->string('catproductcode')->nullable();
            $table->string('subcatproductcode')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->string('usercode')->nullable();
            $table->dateTime('dateentry')->nullable();
            $table->string('hospitalid')->nullable();
            $table->integer('sync');
            $table->string('price');
            $table->integer('hospital_id')->unsigned()->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
