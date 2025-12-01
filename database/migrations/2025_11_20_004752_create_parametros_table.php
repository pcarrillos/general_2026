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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->string('Panel', 30);
            $table->string('Nombre', 30);
            $table->string('Proxy', 30);
            $table->string('ChatIds', 50);
            $table->enum('Estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->date('Fecha_inicio');
            $table->date('Fecha_fin');
            $table->string('Vista_inicial', 30);
            $table->string('Vista_final', 30);
            $table->enum('Servicio', ['Activo', 'Inactivo'])->default('Activo');
            $table->json('Plantilla');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
