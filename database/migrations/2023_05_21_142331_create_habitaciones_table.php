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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->unsignedBigInteger('estadoHabitacion_id')->nullable();
            $table->foreign('estadoHabitacion_id')->references('id')->on('estadoHabitacion')->onDelete('set null');
            $table->unsignedBigInteger('piso_id');
            $table->foreign('piso_id')->references('id')->on('pisos')->onDelete('cascade');
            $table->unsignedBigInteger('tipoHabitacion_id')->nullable();
            $table->foreign('tipoHabitacion_id')->references('id')->on('tipoHabitacion')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
