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
        Schema::create('encargadoDeArea', function (Blueprint $table) {
            $table->increments('pkEncargadoDeArea');
            $table->unsignedInteger('fkPersona');
            $table->unsignedInteger('fkArea');
            $table->smallInteger('estatusEncargadoDeArea');
            $table->timestamps();

            $table->foreign('fkPersona')
                ->references('pkPersona')
                ->on('persona');

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
        Schema::dropIfExists('encargadoDeArea');
    }
};
