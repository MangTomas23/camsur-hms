<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('subcatproductcode')->nullable();
            $table->text('subcatproductdescription')->nullable();
            $table->text('remarks')->nullable();
            $table->text('status')->nullable();
            $table->text('usercode')->nullable();
            $table->dateTime('dateentry')->nullable();
            $table->integer('sync')->nullable();
            $table->string('hospitalid')->nullable();
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
        Schema::dropIfExists('sub_categories');
    }
}
