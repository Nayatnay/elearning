<?php

use App\Http\Controllers\IndexController;
use App\Livewire\Carrito\IndexCarrito;
use App\Livewire\Cursos\IndexCursos;
use App\Livewire\Eventos\IndexEventos;
use App\Livewire\Inscripciones\IndexInscripciones;
use App\Livewire\Recetas\IndexRecetas;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('index');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});

Route::get('/', [IndexController::class, 'index']);

Route::get('cursos', IndexCursos::class)->name('cursos');
Route::get('recetas', IndexRecetas::class)->name('recetas');
Route::get('eventos', IndexEventos::class)->name('eventos');
Route::get('inscripciones', IndexInscripciones::class)->name('inscripciones');
Route::get('carrito', IndexCarrito::class)->name('carrito');