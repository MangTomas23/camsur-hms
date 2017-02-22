<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('extension')->nullable();
            $table->string('age')->nullable();
            $table->string('desc')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('bloodtype')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('fathername')->nullable();
            $table->string('fatherstat')->nullable();
            $table->string('mothername')->nullable();
            $table->string('motherstat')->nullable();
            $table->string('parentsstat')->nullable();
            $table->string('insurancestat')->nullable();
            $table->binary('photo')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('sync')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
