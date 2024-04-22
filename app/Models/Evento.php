<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
    ];

    //Relacion uno a muchos

    public function parrevento()
    {
        return $this->hasMany('App\Models\Parrevento', 'id_evento');
    }


    public function nombre(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucwords($value),
            $set = fn ($value) => strtolower($value)
        );
    }

}
