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
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->unsignedBigInteger('id_compra');
            $table->unsignedBigInteger('id_aceite');
            $table->integer('cantidad');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_compra')->references('id_compra')->on('compras')->onDelete('cascade');
            $table->foreign('id_aceite')->references('id_aceite')->on('aceites')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compra');
    }
};
