<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('pkUsuario');
            $table->unsignedInteger('fkPersona');
            $table->string('nombre', 50);
            $table->text('contraseña');
            $table->smallInteger('estatus');
            $table->unsignedInteger('fkTipoUsuario');
            $table->foreign('fkPersona')->references('pkPersona')->on('persona');
            $table->foreign('fkTipoUsuario')->references('pkTipoUsuario')->on('tipoUsuario');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
