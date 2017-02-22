<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('returncode')->nullable();
            $table->string('status')->nullable();
            $table->text('stockcode')->nullable();
            $table->text('remarks')->nullable();
            $table->text('quantity')->nullable();
            $table->text('dateentry')->nullable();
            $table->text('hospitalid')->nullable();
            $table->integer('sync')->nullable();
            $table->string('usercode')->nullable();
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
        Schema::dropIfExists('returns');
    }
}
