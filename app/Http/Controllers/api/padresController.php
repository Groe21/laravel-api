<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Padres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class padresController extends Controller
{
    public function index()
    {
        $padres = Padres::all();

        $data = [
            'padres' => $padres,
            'status' => 200
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cedula' => 'required|max:10',
            'apellidos' => 'required',
            'nombres' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $padre = Padres::create([
            'cedula' => $request->cedula,
            'apellidos' => $request->apellidos,
            'nombres' => $request->nombres
        ]);

        if (!$padre) {
            $data = [
                'message' => 'Error al crear el padre',
                'status' => 500
            ];

            return response()->json($data, 500);
        }

        $data = [
            'padre' => $padre,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $padre = Padres::find($id);

        if (!$padre) {
            $data = [
                'message' => 'Padre no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $data = [
            'padre' => $padre,
            'status' => 200
        ];

        return response()->json($data);
    }

    public function destroy($id)
    {
        $padre = Padres::find($id);

        if (!$padre) {
            $data = [
                'message' => 'Padre no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $padre->delete();

        $data = [
            'message' => 'Padre eliminado',
            'status' => 200
        ];

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $padre = Padres::find($id);

        if (!$padre) {
            $data = [
                'message' => 'Padre no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'cedula' => 'required|max:10',
            'apellidos' => 'required',
            'nombres' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        $padre->cedula = $request->cedula;
        $padre->apellidos = $request->apellidos;
        $padre->nombres = $request->nombres;

        $padre->save();

        $data = [
            'padre' => $padre,
            'status' => 200
        ];

        return response()->json($data);
    }

    public function updatePartial(Request $request, $id)
    {
        $padre = Padres::find($id);

        if (!$padre) {
            $data = [
                'message' => 'Padre no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'cedula' => 'max:10',
            'apellidos' => '',
            'nombres' => ''
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }

        if ($request->has('cedula')) {
            $padre->cedula = $request->cedula;
        }

        if ($request->has('apellidos')) {
            $padre->apellidos = $request->apellidos;
        }

        if ($request->has('nombres')) {
            $padre->nombres = $request->nombres;
        }

        $padre->save();

        $data = [
            'padre' => $padre,
            'status' => 200
        ];

        return response()->json($data);
    }   
}
