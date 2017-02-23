<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSupplierDsic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consume_stocks', function (Blueprint $table) {
          $table->renameColumn('supplierdsic', 'supplierdisc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consume_stocks', function (Blueprint $table) {
          $table->renameColumn('supplierdisc', 'supplierdsic');
        });
    }
}
