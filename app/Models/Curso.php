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

    public function reqcurso()
    {
        return $this->hasMany('App\Models\Reqcurso', 'id_curso');
    }

    public function alcurso()
    {
        return $this->hasMany('App\Models\Alcurso', 'id_curso');
    }

    public function clacurso()
    {
        return $this->hasMany('App\Models\Clacurso', 'id_curso');
    }

    public function inscripcion()
    {
        return $this->hasMany('App\Models\Inscripcion', 'id_curso');
    }
}
