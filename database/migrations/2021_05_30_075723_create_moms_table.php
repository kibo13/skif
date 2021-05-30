<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMomsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('moms', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('movement_id')->unsigned();
      $table->foreign('movement_id')->references('id')->on('movements')->onDelete('cascade');
      $table->integer('material_id');
      $table->integer('color_id')->nullable();
      $table->double('price')->default(0);
      $table->integer('count')->default(1);
      $table->tinyInteger('measure')->nullable();
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
    Schema::dropIfExists('moms');
  }
}
