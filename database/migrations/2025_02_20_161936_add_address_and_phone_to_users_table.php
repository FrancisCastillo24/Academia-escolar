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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('surname')->nullable(); // Agregar campo 'surname'
            $table->string('address')->nullable();   // Agregar campo 'address'
            $table->string('phone')->nullable(); // Agregar campo 'phone'
            $table->string('date_of_birth')->nullable(); // Agregar campo 'date_of_birth', se ha cambiado en database el tipo campo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['address', 'surname', 'phone', 'date_of_birth']);
        });
    }
};
