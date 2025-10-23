<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $fillable = ['nombre', 'descripcion'];
    
    /**
     * Relación: Una línea tiene muchos productos.
     */
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
