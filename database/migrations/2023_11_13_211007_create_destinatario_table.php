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
        Schema::create('destinatario', function (Blueprint $table) {
            $table->increments('pkDestinatario');
            $table->string('nombreDestinatario', 50);
            $table->string('apellidoPaternoDestinatario', 50);
            $table->string('apellidoMaternoDestinatario', 50);
            $table->string('cargo', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinatario');
    }
};
