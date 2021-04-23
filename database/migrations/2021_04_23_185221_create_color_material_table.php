<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_material', function (Blueprint $table) {
            $table->bigInteger('color_id')->unsigned();
            $table->bigInteger('material_id')->unsigned();

            $table
                ->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');

            $table
                ->foreign('material_id')
                ->references('id')
                ->on('materials')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_material');
    }
}
