<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('customers', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('type_id')->unsigned();
      $table->string('code')->unique();
      $table->string('firstname')->nullable();
      $table->string('lastname')->nullable();
      $table->string('surname')->nullable();
      $table->string('fio')->nullable();
      $table->string('name')->nullable();
      $table->string('email')->unique();
      $table->string('address')->nullable();
      $table->string('phone')->nullable();
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
    Schema::dropIfExists('customers');
  }
}
