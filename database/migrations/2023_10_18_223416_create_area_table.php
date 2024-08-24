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
        Schema::create('area', function (Blueprint $table) {
            $table->increments('pkArea');
            $table->string('nom_numArea', 50);
            $table->unsignedInteger('fkTipoArea');
            $table->unsignedInteger('fkEdificio');
            $table->smallInteger('estatusArea');

            $table->foreign('fkTipoArea')
                ->references('pkTipoArea')
                ->on('tipoArea');
            
            $table->foreign('fkEdificio')
                ->references('pkEdificio')
                ->on('edificio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area');
    }
};
