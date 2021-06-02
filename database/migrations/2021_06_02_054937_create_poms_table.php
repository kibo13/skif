<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePomsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('poms', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('purchase_id')->unsigned();
      $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
      $table->integer('material_id');
      $table->integer('color_id')->nullable();
      $table->integer('count')->default(0);
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
    Schema::dropIfExists('poms');
  }
}
