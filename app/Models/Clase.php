<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'slug',
        'video',
    ];

    //Relacion uno a muchos

    public function clacurso()
    {
        return $this->hasMany('App\Models\Clacurso', 'id_clase');
    }

    public function tema(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucfirst($value),
            $set = fn ($value) => strtolower($value)
        );
    }

}
