<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\estudiantesController;
use App\Http\Controllers\api\padresController;


Route::get('padres', [padresController::class, 'index']);
Route::get('padres/{id}', [padresController::class, 'show']);
Route::post('padres', [padresController::class, 'store']);
Route::put('padres/{id}', [padresController::class, 'update']);
Route::patch('padres/{id}', [padresController::class, 'updatePartial']);
Route::delete('padres/{id}', [padresController::class, 'destroy']);

Route::get('estudiantes', [estudiantesController::class, 'index']);
Route::get('estudiantes/{id}', [estudiantesController::class, 'show']);
Route::post('estudiantes', [estudiantesController::class, 'store']);
Route::put('estudiantes/{id}', [estudiantesController::class, 'update']);
Route::patch('estudiantes/{id}', [estudiantesController::class, 'updatePartial']);
Route::delete('estudiantes/{id}', [estudiantesController::class, 'destroy']);