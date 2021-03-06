<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTopTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('order_top', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('order_id')->unsigned();
      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
      $table->integer('top_id');
      $table->integer('count')->default(1);
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
    Schema::dropIfExists('order_top');
  }
}
