<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'tiempo',
        'porciones',
    ];

    //Relacion uno a muchos

    public function ingrediente()
    {
        return $this->hasMany('App\Models\Ingrediente', 'id_receta');
    }

    //Relacion uno a muchos

    public function indicacion()
    {
        return $this->hasMany('App\Models\Indicacion', 'id_receta');
    }


    public function nombre(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucwords($value),
            $set = fn ($value) => strtolower($value)
        );
    }

    public function descripcion(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucfirst($value),
            $set = fn ($value) => strtolower($value)
        );
    }
}
