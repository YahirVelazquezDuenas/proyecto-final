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
        Schema::create('aceites', function (Blueprint $table) {
            $table->id('id_aceite');
            $table->string('nombre')->nullable(false);
            $table->string('tipo')->nullable();
            $table->float('cantidad')->nullable();
            $table->string('marca')->nullable();
            $table->string('descripcion')->unique();
            $table->float('precio')->nullable(false);
            $table->string('archivo_ubicacion')->nullable();
            $table->string('archivo_nombre')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aceites');
    }
};
