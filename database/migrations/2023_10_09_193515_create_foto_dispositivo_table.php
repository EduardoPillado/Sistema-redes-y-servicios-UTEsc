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
        Schema::create('fotoDispositivo', function (Blueprint $table) {
            $table->increments('pkFotoDispositivo');
            $table->text("nombreFoto");
            $table->unsignedInteger('fkDispositivo');
            $table->foreign('fkDispositivo')->references('pkDispositivo')->on('dispositivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_dispositivo');
    }
};
