<?php
use Illuminate\Support\Facades\Route;

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
use App\Livewire\Admin\VerRegistrosev;
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
use App\Livewire\Suscripcion\PreferenciaSuscripcion;


Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index')->with('sesi');
    })->name('dashboard');
});

Route::get('condiciones', function () {
    return view('terms');
})->name('condiciones');

Route::get('politicas', function () {
    return view('policy');
})->name('politicas');

Route::get('aviso', function () {
    return view('aviso');
})->name('aviso');

Route::get('cursos', IndexCursos::class)->name('cursos');
Route::get('recetas', IndexRecetas::class)->name('recetas');
Route::get('eventos', IndexEventos::class)->name('eventos');
Route::get('inscripciones/{curso:slug}', IndexInscripciones::class)->name('inscripciones');

Route::get('detalledelcurso/{curso:slug}', DetalleCurso::class)->name('detalledelcurso');
Route::get('clasesdelcurso/{clase}', ClasesCurso::class)->name('clasesdelcurso');
Route::get('miscursos', MisCursos::class)->name('miscursos');
Route::get('empleos', IndexEmpleos::class)->name('empleos');
Route::post('solicitud_empleo', [IndexEmpleos::class, 'solicitud'])->name('solicitud_empleo');

Route::get('detallereceta/{receta:slug}', RecetasDetalleReceta::class)->name('detallereceta');

Route::get('detallevento/{evento:slug}', DetalleEvento::class)->name('detallevento');

Route::get('registrosev/{evento}', VerRegistrosev::class)->name('registrosev');

Route::get('contacto', IndexContactanos::class)->name('contacto');

Route::post('contactanos', [IndexContactanos::class, 'contactousuario'])->name('contactanos');
Route::get('preferencia/{email}', PreferenciaSuscripcion::class)->name('preferencia');

Route::get('debaja', function () {
    return view('debaja');
})->name('debaja');

//Rutas de admninistracion
Route::get('admin_cursos', IndexAdmincursos::class)->Middleware('can:admin_cursos')->name('admin_cursos');
Route::get('selec_requisitos/{curso}', SelecRequisitos::class)->Middleware('can:selec_requisitos')->name('selec_requisitos');
Route::get('selec_alcances/{curso}', SelecAlcances::class)->Middleware('can:selec_alcances')->name('selec_alcances');
Route::get('selec_clases/{curso}', SelecClases::class)->Middleware('can:selec_clases')->name('selec_clases');
Route::get('inscritos/{curso}', VerInscritos::class)->Middleware('can:inscritos')->name('inscritos');
Route::get('admin_validar', ValidarInscripcion::class)->Middleware('can:admin_validar')->name('admin_validar');

Route::get('admin_recetas', IndexAdminrecetas::class)->Middleware('can:admin_recetas')->name('admin_recetas');
Route::get('selec_ingredientes/{receta}', SelecIngredientes::class)->Middleware('can:selec_ingredientes')->name('selec_ingredientes');
Route::get('selec_indicaciones/{receta}', SelecIndicaciones::class)->Middleware('can:selec_indicaciones')->name('selec_indicaciones');


Route::get('admin_eventos', IndexAdmineventos::class)->Middleware('can:admin_eventos')->name('admin_eventos');
Route::get('selec_parrafos/{evento}', SelecParrafos::class)->Middleware('can:selec_parrafos')->name('selec_parrafos');

Route::get('admin_slides', IndexAdminslide::class)->Middleware('can:admin_slides')->name('admin_slides');

Route::get('admin_usuarios', IndexAdminusuarios::class)->Middleware('can:admin_usuarios')->name('admin_usuarios');
Route::get('ver_matricula/{usuario}', IndexAdminmatricula::class)->Middleware('can:ver_matricula')->name('ver_matricula');


