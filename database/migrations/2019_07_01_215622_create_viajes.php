<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('hora_de_salida');
            $table->string('origen');
            $table->string('destino');
            $table->string('punto_de_encuentro');
            $table->integer('puestos_disponibles');
            $table->unsignedBigInteger('id_estudiante')->references('id')->on('users');
            $table->unsignedBigInteger('id_vehiculo')->references('id')->on('vehiculos');
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
        Schema::dropIfExists('viajes');
    }
}
