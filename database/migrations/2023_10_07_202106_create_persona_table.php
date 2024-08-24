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
            Schema::create('persona', function (Blueprint $table) {
                $table->increments('pkPersona');
                $table->string('nombre', 50);
                $table->string('apellidoPaterno', 50);
                $table->string('apellidoMaterno', 50);
                $table->smallInteger('estatus');
                $table->string('correo', 50);
                $table->timestamps();
            });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
