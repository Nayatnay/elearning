<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alcance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curso',
        'descripcion',
    ];

        //Relacion uno a muchos (inversa)

        public function curso()
        {
            return $this->belongsTo('App\Models\Curso', 'id_curso');
        }
    
        
}
