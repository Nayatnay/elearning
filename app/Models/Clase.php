<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema',
        'video',
        'poster',
    ];

//Relacion uno a muchos

public function clacurso()
{
    return $this->hasMany('App\Models\Clacurso', 'id_clase');
}
 
}
