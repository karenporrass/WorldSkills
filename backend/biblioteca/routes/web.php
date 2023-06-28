<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\PrestamoLibrosController;
use App\Http\Controllers\DetallePrestamoLibrosController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/save-aprendiz', [AprendicesController::class, 'post']);
Route::put('/api/update-aprendiz/{id}', [AprendicesController::class, 'put']);
Route::delete('/api/delete-aprendiz/{id}', [AprendicesController::class, 'delete']);
Route::get('/api/get-aprendices', [AprendicesController::class, 'get']);
Route::get('/api/get-aprendiz/{documento}', [AprendicesController::class, 'getSelect']);


Route::post('/api/save-libro', [LibrosController::class, 'post']);
Route::put('/api/update-libro/{id}', [LibrosController::class, 'put']);
Route::delete('/api/delete-libro/{id}', [LibrosController::class, 'delete']);
Route::get('/api/get-libros', [LibrosController::class, 'get']);
Route::get('/api/get-libros/{isbn}', [LibrosController::class, 'get']);
Route::post('/api/prestamoLibros', [PrestamoLibrosController::class, 'post']);
Route::get('/api/detalleLibros/{id}', [DetallePrestamoLibrosController::class, 'get']);
Route::get('/api/detalleLibros', [PrestamoLibrosController::class, 'get']);
Route::get('/api/detalleLibrosDoc/{id}', [PrestamoLibrosController::class, 'getDocument']);
Route::put('/api/detalleLibros/{id}', [DetallePrestamoLibrosController::class, 'put']);


Route::post('/api/save-equipo', [EquiposController::class, 'post']);
Route::put('/api/update-equipo/{id}', [EquiposController::class, 'put']);
Route::delete('/api/delete-equipo/{id}', [EquiposController::class, 'delete']);
Route::get('/api/get-equipos', [EquiposController::class, 'get']);

