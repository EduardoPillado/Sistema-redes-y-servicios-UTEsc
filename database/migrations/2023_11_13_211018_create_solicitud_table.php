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
        Schema::create('solicitud', function (Blueprint $table) {
            $table->increments('pkSolicitud');
            $table->string('asunto', 50);
            $table->unsignedInteger('fkDestinatario');
            $table->text('descripcionSolicitud');
            $table->text('caracteristicas');
            $table->string('costo', 50);
            $table->text('despedida');
            $table->date('fechaSolicitud');
            $table->string('solicitante', 50);
            $table->string('cargoSolicitante', 50);
            $table->timestamps();

            $table->foreign('fkDestinatario')
                ->references('pkDestinatario')
                ->on('destinatario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud');
    }
};
