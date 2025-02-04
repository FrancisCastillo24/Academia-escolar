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
        Schema::table('workshops', function (Blueprint $table) {
            // Eliminar los campos antiguos
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');

            // Agregar los nuevos campos correctos
            $table->date('date')->after('price'); // Campo para la fecha del taller
            $table->time('start_time')->after('date'); // Nueva hora de inicio
            $table->time('end_time')->nullable()->after('start_time'); // Nueva hora de fin
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workshops', function (Blueprint $table) {
            // Revertir cambios eliminando los nuevos campos
            $table->dropColumn(['date', 'start_time', 'end_time']);

            // Restaurar el campo original si es necesario
            $table->dateTime('start_time')->after('price');
            $table->time('end_time')->nullable()->after('start_time');
        });
    }
};
