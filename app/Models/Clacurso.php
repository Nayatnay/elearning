<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clacurso extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_curso',
        'descripcion',
        'slug',
        'video',
    ];

    //Relacion uno a muchos (inversa)

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'id_curso');
    }

    public function descripcion(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucfirst($value),
            $set = fn ($value) => strtolower($value)
        );
    }

}
