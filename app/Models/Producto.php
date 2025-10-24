<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'linea_id',
        'nombre',
        'descripcion_corta',
        'descripcion_larga',
        'beneficios', // 🟢 Nuevo
        'presentaciones', // 🟢 Nuevo
        'precio',
        'imagen_ruta',
        'stock',
    ];

    /**
     * Relación: Un producto pertenece a una línea.
     */
    public function linea(): BelongsTo
    {
        return $this->belongsTo(Linea::class);
    }
}
