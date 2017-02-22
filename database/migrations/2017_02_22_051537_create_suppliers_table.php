<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('suppliercode')->nullable();
            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->dateTime('dateentry')->nullable();
            $table->string('hospitalid')->nullable();
            $table->integer('sync')->nullable();
            $table->string('usercode')->nullable();
            $table->string('contactno')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
