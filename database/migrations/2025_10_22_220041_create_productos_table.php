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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('linea_id')->constrained()->onDelete('cascade'); // Clave foránea a la tabla 'lineas'
            $table->string('nombre', 250);
            $table->string('descripcion_corta', 355);
            $table->text('descripcion_larga');
            $table->decimal('precio', 8, 2); // Precio con 8 dígitos totales y 2 decimales
            $table->string('imagen_ruta', 555)->nullable(); // Ruta del archivo de imagen
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
