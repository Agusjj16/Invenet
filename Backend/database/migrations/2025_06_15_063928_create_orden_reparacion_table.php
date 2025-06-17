<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('orden_reparacion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_orden');
            $table->date('fecha_reparacion')->nullable(); 
            $table->text('descripcion');
            $table->foreignId('informe_id')->nullable()->index();
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_reparacion');
    }
};
