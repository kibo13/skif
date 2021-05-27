<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('suppliers', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('code')->unique();
      $table->string('name');
      $table->string('firstname');
      $table->string('lastname');
      $table->string('surname');
      $table->string('fio')->nullable();
      $table->string('country');
      $table->string('city');
      $table->string('index');
      $table->string('address');
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
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
    Schema::dropIfExists('suppliers');
  }
}
