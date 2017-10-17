<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticulosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock');
            $table->decimal('precio');
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('id_comercio')->unsigned();
            $table->foreign('id_comercio')->references('id')->on('comercios')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();            
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articulos');
    }
}
