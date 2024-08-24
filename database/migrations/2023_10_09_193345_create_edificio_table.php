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
        Schema::create('edificio', function (Blueprint $table) {
            $table->increments('pkEdificio');
            $table->string('nombreEdificio', 50);
            $table->string('pseudonimo');
            $table->smallInteger('estatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edificio');
    }
};
