<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_estud')->references('id')->on('users');
            $table->string('placa')->unique();
            $table->string('color');
            $table->string('marca');
            $table->string('tipo');
            $table->string('puestos');
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
        Schema::dropIfExists('vehiculos');
    }
}
