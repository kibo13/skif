<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('code')->nullable();
      $table->date('date_on')->nullable();
      $table->date('date_off')->nullable();
      $table->integer('customer_id')->nullable();
      $table->integer('worker_id')->nullable();
      $table->tinyInteger('pay')->default(0);
      $table->tinyInteger('depo')->default(0);
      $table->tinyInteger('debt')->default(0);
      $table->double('total')->default(0);
      $table->tinyInteger('state')->default(0);
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
    Schema::dropIfExists('orders');
  }
}
