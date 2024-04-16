<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_curso',
        'turno',
        'liberado',
    ];

    //Relacion uno a muchos (inversa)

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function curso()
    {
        return $this->belongsTo('App\Models\Curso', 'id_curso');
    }
    
}
