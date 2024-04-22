<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parrevento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_evento',
        'descripcion',
    ];

    //Relacion uno a muchos (inversa)

    public function evento()
    {
        return $this->belongsTo('App\Models\evento', 'id_evento');
    }

    /*
    public function descripcion(): Attribute
    {
        return new Attribute(
            $get = fn ($value) => ucfirst($value),
            $set = fn ($value) => strtolower($value),
        );
    }
*/
}
