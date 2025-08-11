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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string ('dni')->unique();
            $table->string ('name');
            $table->string ('apellido')->nullable();
            $table->string ('cargo');
            $table->string ('fecha_ingreso');
            $table->string ('fecha_salida');
            $table->string ('en_planilla')->nullable();
            $table->string ('descanso_fijo');
            $table->string ('fotografia');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('set null');











            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
