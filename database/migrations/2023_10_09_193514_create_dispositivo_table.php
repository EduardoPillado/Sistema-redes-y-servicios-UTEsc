<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispositivo', function (Blueprint $table) {
            $table->increments('pkDispositivo'); // La columna 'pkDispositivo' actúa como clave primaria
            $table->string('nombre', 50);
            $table->string('serie', 50);
            $table->unsignedInteger('fkEdificio');
            $table->unsignedInteger('fkModelo');
            $table->unsignedInteger('fkMarca');
            $table->integer('cantidadPuertos')->nullable();
            $table->unsignedInteger('fkTipoDispositivo');
            $table->smallInteger('estatus');
            $table->timestamps();
            // Definición de las relaciones de clave externa
            $table->foreign('fkEdificio')->references('pkEdificio')->on('edificio');
            $table->foreign('fkModelo')->references('pkModelo')->on('modelo');
            $table->foreign('fkMarca')->references('pkMarca')->on('marca');
            $table->foreign('fkTipoDispositivo')->references('pkTipoDispositivo')->on('tipoDispositivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivo');
    }
};
