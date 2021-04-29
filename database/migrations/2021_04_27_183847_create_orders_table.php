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
            $table->string('code')->unique();
            $table->date('date_in');
            $table->date('date_out')->nullable();
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->integer('tree_id');
            $table->integer('material_id');
            $table->integer('fabric_id')->nullable();
            $table->integer('worker_id')->nullable();
            $table->tinyInteger('count');
            $table->tinyInteger('sale')->nullable();
            $table->double('price')->default(0);
            $table->tinyInteger('state')->default(0);
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
