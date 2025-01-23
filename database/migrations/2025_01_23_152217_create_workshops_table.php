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
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del taller
            $table->text('description'); // Descripción del taller
            $table->double('price'); // Precio del taller
            $table->datetime('start_time'); // Fecha y hora de inicio
            $table->datetime('end_time')->nullable(); // Fecha y hora de fin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
