<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoLibroController;
use App\Http\Controllers\PrestamoEquipoController;
use App\Http\Controllers\DetallePrestamoLibroController;
use App\Http\Controllers\DetallePrestamoEquipoontroller;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/guardar-aprendiz',[AprendizController::class, 'post']);
Route::get('/aprendices',[AprendizController::class, 'get']);
Route::delete('/borrar-aprendiz/{id}',[AprendizController::class, 'delete']);

Route::post('/guardar-libro',[LibroController::class, 'post']);
Route::get('/libros',[LibroController::class, 'get']);
Route::delete('/borrar-libro/{id}',[LibroController::class, 'delete']);

Route::post('/guardar-equipo',[EquipoController::class, 'post']);
Route::get('/equipos',[EquipoController::class, 'get']);
Route::delete('/borrar-equipo/{id}',[EquipoController::class, 'delete']);

Route::post('/guardar-prestamoLibro',[PrestamoLibroController::class, 'post']);
Route::get('/prestamos-libros',[PrestamoLibroController::class, 'getAll']);
Route::get('/prestamos-libros/{id}',[PrestamoLibroController::class, 'getDoc']);

Route::post('/guardar-prestamoLibro',[PrestamoEquipoController::class, 'post']);
Route::get('/prestamos-libros',[PrestamoEquipoController::class, 'getAll']);
Route::get('/prestamos-libros/{id}',[PrestamoEquipoController::class, 'getDoc']);




