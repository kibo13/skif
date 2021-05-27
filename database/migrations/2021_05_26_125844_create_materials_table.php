<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('materials', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->tinyInteger('tom')->nullable();
      $table->string('name');
      $table->double('L')->nullable();
      $table->double('B')->nullable();
      $table->double('H')->nullable();
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
    Schema::dropIfExists('materials');
  }
}
