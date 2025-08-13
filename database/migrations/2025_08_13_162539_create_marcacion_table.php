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
        Schema::create('marcacion', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_marcacion')->nullable(); 
            $table->dateTime('fecha_hora_ingreso')->nullable(); 
            $table->dateTime('fecha_hora_salida')->nullable();

            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marcacion');
    }
};
