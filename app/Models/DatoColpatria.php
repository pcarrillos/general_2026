<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatoColpatria extends Model
{
    protected $table = 'datos_colpatria';

    protected $fillable = [
        'nombre',
        'cedula',
        'celular',
        'token',
        'email',
        'direccion',
        'ciudad',
        'departamento',
    ];
}
