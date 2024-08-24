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
        Schema::create('servicioDispositivo', function (Blueprint $table) {
            $table->increments('pkServicioDispositivo');
            $table->unsignedInteger('fkServicio');
            $table->unsignedInteger('fkDispositivo');
            $table->timestamps();

            $table->foreign('fkServicio')
                ->references('pkServicio')
                ->on('servicio');
            
            $table->foreign('fkDispositivo')
                ->references('pkDispositivo')
                ->on('dispositivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicioDispositivo');
    }
};
