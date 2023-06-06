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
        Schema::create('acompanantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fechaNacimiento');
            $table->string('tipoIdentificacion')->nullable();
            $table->string('identificacion')->nullable();
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acompanantes');
    }
};
