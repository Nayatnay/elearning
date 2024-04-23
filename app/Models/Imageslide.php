<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageslide extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'estado',
        'imagen',
    ];
}
