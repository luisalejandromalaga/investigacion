<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\TecnicaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\RevisadoController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('investigacion', [InvestigacionController::class, 'show'])->name('investigacion');

Route::post('nueva/investigacion', [InvestigacionController::class, 'create'])->name('nueva.investigacion');

Route::get('investigacion/analizar/{id}', [TecnicaController::class, 'analizar'])->name('investigacion/analizar');

Route::get('clasificar', [InvestigacionController::class, 'clasificar'])->name('clasificar');

Route::get('revisados', [InvestigacionController::class, 'revisados'])->name('revisados');

Route::get('analizar', [
    'as' => 'investigacion/analizar', 'uses' => [TecnicaController::class, 'analizar']
])->name('investigacion/analizar');


#Crear una nueva técnica
Route::post('nueva/tecnica', [TecnicaController::class, 'create'])->name('nueva.tecnica');


#Crear una nuevo registro
Route::post('nueva/registro', [RegistroController::class, 'create'])->name('nueva.registro');

#Crear una nuevo Revisado
Route::post('nueva/revisado', [RevisadoController::class, 'create'])->name('nueva.revisado');