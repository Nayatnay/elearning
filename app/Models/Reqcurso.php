<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqcurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curso',
        'id_requisito',
    ];

    //Relacion uno a muchos (inversa)

    public function requisito()
    {
        return $this->belongsTo('App\Models\Requisito', 'id_requisito');
    }

    //Relacion uno a muchos (inversa)

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'id_curso');
    }
}
