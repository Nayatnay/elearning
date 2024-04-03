<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clacurso extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_curso',
        'id_clase',
    ];

    //Relacion uno a muchos (inversa)

    public function clase()
    {
        return $this->belongsTo('App\Models\Clase', 'id_clase');
    }

    //Relacion uno a muchos (inversa)

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'id_curso');
    }

}
