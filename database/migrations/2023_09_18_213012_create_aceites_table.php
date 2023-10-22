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
            $table->timestamps();
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
