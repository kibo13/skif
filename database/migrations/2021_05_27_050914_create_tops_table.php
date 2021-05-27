<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tops', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('product_id')->unsigned();
      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
      $table->integer('color_id')->nullable();
      $table->text('image')->nullable();
      $table->text('note')->nullable();
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
    Schema::dropIfExists('tops');
  }
}
