<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservarViaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('viajereservado');
        Schema::create('viajereservado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('hora_de_salida');
            $table->string('origen');
            $table->string('destino');
            $table->string('punto_de_encuentro');
            $table->unsignedBigInteger('id_oferta')->references('id')->on('users');
            $table->unsignedBigInteger('id_vehiculo')->references('id')->on('vehiculos');
            $table->unsignedBigInteger('id_reserva')->references('id')->on('users');
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
        Schema::dropIfExists('viajereservado');
    }
}
