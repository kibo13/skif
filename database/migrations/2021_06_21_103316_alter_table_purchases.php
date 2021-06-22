<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePurchases extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('purchases', function (Blueprint $table) {
      $table->integer('supplier_id')->nullable();
      $table->tinyInteger('pay')->nullable();
      $table->tinyInteger('depo')->nullable();
      $table->tinyInteger('debt')->nullable();
      $table->double('total')->nullable();
      $table->date('date_off')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('purchases', function (Blueprint $table) {
      $table->dropColumn('supplier_id');
      $table->dropColumn('pay');
      $table->dropColumn('depo');
      $table->dropColumn('debt');
      $table->dropColumn('total');
      $table->dropColumn('date_off');
    });
  }
}
