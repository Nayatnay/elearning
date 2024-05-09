<?php

use App\Livewire\Admin\IndexAdmincursos;
use App\Livewire\Admin\IndexAdmineventos;
use App\Livewire\Admin\IndexAdminmatricula;
use App\Livewire\Admin\IndexAdminrecetas;

use App\Livewire\Admin\IndexAdminslide;
use App\Livewire\Admin\IndexAdminusuarios;
use App\Livewire\Admin\SelecAlcances;
use App\Livewire\Admin\SelecClases;
use App\Livewire\Admin\SelecIndicaciones;
use App\Livewire\Admin\SelecIngredientes;
use App\Livewire\Admin\SelecParrafos;
use App\Livewire\Admin\SelecRequisitos;
use App\Livewire\Admin\ValidarInscripcion;
use App\Livewire\Admin\VerInscritos;

use App\Livewire\Contacto\IndexContactanos;
use App\Livewire\Cursos\ClasesCurso;
use App\Livewire\Cursos\DetalleCurso;
use App\Livewire\Cursos\IndexCursos;
use App\Livewire\Cursos\MisCursos;
use App\Livewire\Empleos\IndexEmpleos;
use App\Livewire\Eventos\DetalleEvento;
use App\Livewire\Eventos\IndexEventos;

use App\Livewire\Inscripciones\IndexInscripciones;
use App\Livewire\Recetas\DetalleReceta as RecetasDetalleReceta;
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
Route::get('inscripciones/{curso}', IndexInscripciones::class)->name('inscripciones');

Route::get('detalledelcurso/{curso}', DetalleCurso::class)->name('detalledelcurso');
Route::get('clasesdelcurso/{curso}/{clase}/{inscrito}', ClasesCurso::class)->name('clasesdelcurso');
Route::get('miscursos', MisCursos::class)->name('miscursos');
Route::get('index_empleos', IndexEmpleos::class)->name('index_empleos');
Route::post('solicitud_empleo', [IndexEmpleos::class, 'solicitud'])->name('solicitud_empleo');

//Rutas de admninistracion
Route::get('admin_cursos', IndexAdmincursos::class)->name('admin_cursos');
Route::get('selec_requisitos/{curso}', SelecRequisitos::class)->name('selec_requisitos');
Route::get('selec_alcances/{curso}', SelecAlcances::class)->name('selec_alcances');
Route::get('selec_clases/{curso}', SelecClases::class)->name('selec_clases');
Route::get('inscritos/{curso}', VerInscritos::class)->name('inscritos');
Route::get('admin_validar', ValidarInscripcion::class)->name('admin_validar');

Route::get('admin_recetas', IndexAdminrecetas::class)->name('admin_recetas');
Route::get('selec_ingredientes/{receta}', SelecIngredientes::class)->name('selec_ingredientes');
Route::get('selec_indicaciones/{receta}', SelecIndicaciones::class)->name('selec_indicaciones');
Route::get('detallereceta/{receta}', RecetasDetalleReceta::class)->name('detallereceta');

Route::get('admin_eventos', IndexAdmineventos::class)->name('admin_eventos');
Route::get('selec_parrafos/{evento}', SelecParrafos::class)->name('selec_parrafos');
Route::get('detallevento/{evento}', DetalleEvento::class)->name('detallevento');

Route::get('admin_slides', IndexAdminslide::class)->name('admin_slides');

Route::get('admin_usuarios', IndexAdminusuarios::class)->name('admin_usuarios');
Route::get('ver_matricula/{usuario}', IndexAdminmatricula::class)->name('ver_matricula');

Route::get('contacto', IndexContactanos::class)->name('contacto');

Route::post('contactanos', [IndexContactanos::class, 'contactousuario'])->name('contactanos');