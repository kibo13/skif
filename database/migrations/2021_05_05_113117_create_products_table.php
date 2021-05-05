<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->string('code');
            $table->string('name');
            $table->integer('material_id')->nullable();
            $table->integer('fabric_id')->nullable();
            $table->double('L')->default(0);
            $table->double('B')->default(0);
            $table->double('H')->default(0);
            $table->double('price')->default(0);
            $table->text('image')->nullable();
            $table->text('note')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
