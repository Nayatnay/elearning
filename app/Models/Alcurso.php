<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curso',
        'id_alcance',
    ];

    //Relacion uno a muchos (inversa)

    public function alcance()
    {
        return $this->belongsTo('App\Models\Alcance', 'id_alcance');
    }

    //Relacion uno a muchos (inversa)

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'id_curso');
    }

}
