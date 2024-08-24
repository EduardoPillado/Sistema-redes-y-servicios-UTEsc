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
        Schema::create('red', function (Blueprint $table) {
            $table->increments('pkRed');
            $table->string('nombreRed', 50);
            $table->unsignedBigInteger('fkTipoRed');
            $table->string('vlan', 50)->nullable();
            $table->date('fecha');
            $table->timestamps();
            $table->smallInteger('estatus');

            $table->foreign('fkTipoRed')
                ->references('pkTipoRed')
                ->on('tipoRed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('red');
    }
};
