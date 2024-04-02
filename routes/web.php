<?php

use App\Http\Controllers\IndexController;
use App\Livewire\Admin\CrearAdmincursos;
use App\Livewire\Admin\CrearAdminrequisitos;
use App\Livewire\Admin\IndexAdminalcances;
use App\Livewire\Admin\IndexAdmincursos;
use App\Livewire\Admin\IndexAdminrequisitos;
use App\Livewire\Carrito\IndexCarrito;
use App\Livewire\Cursos\IndexCursos;
use App\Livewire\Eventos\IndexEventos;
use App\Livewire\Index\IndexMain;
use App\Livewire\Inscripciones\IndexInscripciones;
use App\Livewire\Recetas\IndexRecetas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});

Route::get('cursos', IndexCursos::class)->name('cursos');
Route::get('recetas', IndexRecetas::class)->name('recetas');
Route::get('eventos', IndexEventos::class)->name('eventos');
Route::get('inscripciones', IndexInscripciones::class)->name('inscripciones');
Route::get('carrito', IndexCarrito::class)->name('carrito');

//Rutas de admninistracion
route::get('admin_cursos', IndexAdmincursos::class)->name('admin_cursos');
route::get('admin_crearcursos', CrearAdmincursos::class)->name('admin_crearcursos');

route::get('admin_requisitos', IndexAdminrequisitos::class)->name('admin_requisitos');
route::get('admin_crearrequisitos', CrearAdminrequisitos::class)->name('admin_crearrequisitos');

route::get('admin_alcances', IndexAdminalcances::class)->name('admin_alcances');