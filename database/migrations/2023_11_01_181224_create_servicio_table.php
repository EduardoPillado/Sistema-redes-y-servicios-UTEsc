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
        Schema::create('servicio', function (Blueprint $table) {
            $table->increments('pkServicio');
            $table->unsignedInteger('fkTipoServicio');
            $table->unsignedInteger('fkAccion');
            $table->unsignedInteger('fkArea');
            $table->text('descripcion');
            $table->text('observaciones');
            $table->date('fechaServicio');
            $table->timestamps();

            $table->foreign('fkTipoServicio')
                ->references('pkTipoServicio')
                ->on('tipoServicio');
            
            $table->foreign('fkAccion')
                ->references('pkAccion')
                ->on('accion');
            
            $table->foreign('fkArea')
                ->references('pkArea')
                ->on('area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
