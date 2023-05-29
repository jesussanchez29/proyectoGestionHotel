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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fechaLLegada');
            $table->date('fechaSalida');
            $table->decimal('abonado');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedBigInteger('habitacion_id');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('set null');
            $table->unsignedBigInteger('estadoReserva_id')->nullable();
            $table->foreign('estadoReserva_id')->references('id')->on('EstadoReserva')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
