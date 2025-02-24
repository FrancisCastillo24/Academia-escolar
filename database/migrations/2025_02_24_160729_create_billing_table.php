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
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con el usuario
            $table->integer('workshop_amount'); // Cantidad de talleres
            $table->decimal('fee_price'); // Precio de la tarifa
            $table->decimal('price'); // Precio total
            $table->date('payment_date'); // Fecha de pago
            $table->string('payment_method'); // Método de pago
            $table->string('status'); // Estado de pago
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};
