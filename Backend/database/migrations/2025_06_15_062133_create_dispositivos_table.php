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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('estado');
            $table->string('marca');
            $table->date('fecha_ingreso');
            $table->string('componentes')->nullable();
            $table->string('num_serie')->unique();
            $table->foreignId('sala_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};