<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcance extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
    ];

    //Relacion uno a muchos

    public function alcurso()
    {
        return $this->hasMany('App\Models\Alcurso', 'id_alcance');
    }

    public function descripcion(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucfirst($value),
            $set = fn ($value) => strtolower($value)
        );
    }
}
