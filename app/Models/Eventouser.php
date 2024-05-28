<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventouser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_evento',
    ];

    //Relacion uno a muchos (inversa)

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    //Relacion uno a muchos (inversa)

    public function evento()
    {
        return $this->belongsTo('App\Models\Evento', 'id_evento');
    }

}
