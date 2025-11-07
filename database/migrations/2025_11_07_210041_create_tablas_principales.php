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
        /**
         * Tabla: usuarios
         */
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->string('password');
            $table->enum('rol', ['abogado', 'cliente', 'admin'])->default('abogado');
            $table->timestamps();
        });

        /**
         * Tabla: casos
         */
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->enum('estado', ['abierto', 'en_progreso', 'cerrado'])->default('abierto');
            $table->text('reporte')->nullable();
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_cierre')->nullable();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
        });

        /**
         * Tabla: solicitudes
         */
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('correo')->unique();
            $table->string('telefono')->nullable();
            $table->text('experiencia')->nullable();
            $table->string('hoja_vida')->nullable();
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reversa las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
        Schema::dropIfExists('casos');
        Schema::dropIfExists('usuarios');
    }
};
