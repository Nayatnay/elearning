<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];

    public function email(): Attribute
    {
        return new Attribute(
            $set = fn ($value) => strtolower($value)
        );
    }

   
}
