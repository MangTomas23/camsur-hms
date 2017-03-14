<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulletinCategoryColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulletins', function (Blueprint $table) {
          $table->integer('bulletin_category_id')->unsigned();
          $table->foreign('bulletin_category_id')->references('id')
                ->on('bulletin_categories')->onDelete('cascade');
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
          $table->dropForeign('bulletins_bulletin_category_id_foreign');
          $table->dropColumn('bulletin_category_id');
        });
    }
}
