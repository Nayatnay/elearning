<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
    ];

    //Relacion uno a muchos

    public function reqcurso()
    {
        return $this->hasMany('App\Models\Reqcurso', 'id_requisito');
    }
}
