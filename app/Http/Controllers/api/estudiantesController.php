<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class estudiantesController extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::all();

        $data = [
            'estudiantes' => $estudiantes,
            'status' => 200
        ];

        return response()->json($data);
    }
    
}
