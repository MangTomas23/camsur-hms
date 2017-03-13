<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulletinAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bulletin_id')->unsigned();
            $table->foreign('bulletin_id')->references('id')->on('bulletins')
                  ->onDelete('cascade');
            $table->string('public_id');
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
        Schema::dropIfExists('bulletin_attachments');
    }
}
