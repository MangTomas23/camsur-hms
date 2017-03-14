<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeSubjectAndDescriptionNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulletins', function (Blueprint $table) {
          $table->string('subject')->nullable()->change();
          $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulletins', function (Blueprint $table) {
          $table->string('subject')->nullable(false)->change();
          $table->text('description')->nullable(false)->change();
        });
    }
}
