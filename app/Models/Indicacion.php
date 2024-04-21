<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_receta',
        'descripcion',
        'imagen',
    ];

    //Relacion uno a muchos (inversa)

    public function receta()
    {
        return $this->belongsTo('App\Models\Receta', 'id_receta');
    }

    public function descripcion(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucfirst($value),
            $set = fn ($value) => strtolower($value)
        );
    }
}
