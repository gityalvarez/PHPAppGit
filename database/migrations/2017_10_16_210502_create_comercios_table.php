<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComerciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('comercios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('latitud');
            $table->string('longitud');
            $table->string('direccion');
            $table->string('logo');
            $table->integer('id_gerente')->unsigned();
            $table->foreign('id_gerente')->references('id')->on('personas')->onDelete('cascade');
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
        Schema::drop('comercios');
    }
}
