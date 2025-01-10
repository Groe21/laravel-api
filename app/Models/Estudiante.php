<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    Use HasFactory;

    protected $tabel = 'estudiantes';

    protected $fillable = [
        'cedula',
        'apellidos',
        'nombres',
        'curso',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'residencia'
    ];
}
