<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

Route::post('/corrector',[\App\Http\Controllers\CorrectorController::class,'corregir'])->name('corrector');
Route::post('/preguntastema', [App\Http\Controllers\PreguntaController::class,'showByBloque'])->name('preguntastema');

Route::post('/preguntas', [App\Http\Controllers\PreguntaController::class,'showByCategory'])->name('preguntas');
Route::post('/preguntasgeneral', [App\Http\Controllers\PreguntaController::class,'general'])->name('preguntasgeneral');
//Route::get('/test', [App\Http\Controllers\TestPorCateriasController::class,'index'])->name('test')->middleware('auth:sanctum');Route::get('/test', [App\Http\Controllers\TestPorCateriasController::class,'index'])->name('test')->middleware('auth:sanctum');
Route::get('/test', [App\Http\Controllers\TestPorCateriasController::class,'index'])->name('test');