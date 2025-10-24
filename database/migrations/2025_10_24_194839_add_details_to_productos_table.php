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
        Schema::table('productos', function (Blueprint $table) {
            // Añadir campos para almacenar listas de texto (JSON/TEXT serializado)
            $table->text('beneficios')->nullable()->after('descripcion_larga'); 
            $table->text('presentaciones')->nullable()->after('beneficios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('beneficios');
            $table->dropColumn('presentaciones');
        });
    }
};
