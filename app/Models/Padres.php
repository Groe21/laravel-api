<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Padres extends Model
{
    use HasFactory;

    protected $table = 'padres';

    protected $fillable = ['cedula', 'apellidos', 'nombres'];  
}
