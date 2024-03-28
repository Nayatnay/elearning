<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attribute as LivewireAttribute;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'costo',
    ];

    //Relacion uno a muchos

    public function requisitos()
    {
        return $this->hasMany('App\Models\Requisitos', 'id_curso');
    }

    public function alcances()
    {
        return $this->hasMany('App\Models\Alcances', 'id_curso');
    }

    public function clases()
    {
        return $this->hasMany('App\Models\Clases', 'id_curso');
    }

    
}
