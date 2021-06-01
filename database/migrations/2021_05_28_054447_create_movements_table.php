<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('movements', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('code');
      $table->tinyInteger('tot');
      $table->date('date_move');
      $table->integer('worker_id')->nullable();
      $table->integer('user_id')->nullable();
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
    Schema::dropIfExists('movements');
  }
}
