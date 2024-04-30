<?php

use App\Http\Controllers\IndexController;
use App\Livewire\Admin\CrearAdmincursos;
use App\Livewire\Admin\CrearAdminrequisitos;
use App\Livewire\Admin\DetalleReceta;
use App\Livewire\Admin\IndexAdminalcances;
use App\Livewire\Admin\IndexAdminclases;
use App\Livewire\Admin\IndexAdmincursos;
use App\Livewire\Admin\IndexAdmineventos;
use App\Livewire\Admin\IndexAdminrecetas;
use App\Livewire\Admin\IndexAdminreqalc;
use App\Livewire\Admin\IndexAdminrequisitos;
use App\Livewire\Admin\IndexAdminslide;
use App\Livewire\Admin\SelecAlcances;
use App\Livewire\Admin\SelecClases;
use App\Livewire\Admin\SelecIndicaciones;
use App\Livewire\Admin\SelecIngredientes;
use App\Livewire\Admin\SelecParrafos;
use App\Livewire\Admin\SelecRequisitos;
use App\Livewire\Admin\ValidarInscripcion;
use App\Livewire\Admin\VerInscritos;
use App\Livewire\Carrito\IndexCarrito;
use App\Livewire\Cursos\ClasesCurso;
use App\Livewire\Cursos\DetalleCurso;
use App\Livewire\Cursos\IndexCursos;
use App\Livewire\Cursos\MisCursos;
use App\Livewire\Empleos\IndexEmpleos;
use App\Livewire\Eventos\DetalleEvento;
use App\Livewire\Eventos\IndexEventos;
use App\Livewire\Index\IndexMain;
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
//Route::get('carrito', IndexCarrito::class)->name('carrito');

route::get('detalledelcurso/{curso}', DetalleCurso::class)->name('detalledelcurso');
route::get('clasesdelcurso/{curso}/{clase}/{inscrito}', ClasesCurso::class)->name('clasesdelcurso');
route::get('miscursos', MisCursos::class)->name('miscursos');
route::get('index_empleos', IndexEmpleos::class)->name('index_empleos');

//Rutas de admninistracion
route::get('admin_cursos', IndexAdmincursos::class)->name('admin_cursos');
route::get('selec_requisitos/{curso}', SelecRequisitos::class)->name('selec_requisitos');
route::get('selec_alcances/{curso}', SelecAlcances::class)->name('selec_alcances');
route::get('selec_clases/{curso}', SelecClases::class)->name('selec_clases');
/*route::get('admin_requisitos', IndexAdminrequisitos::class)->name('admin_requisitos');
route::get('admin_alcances', IndexAdminalcances::class)->name('admin_alcances');
route::get('admin_clases', IndexAdminclases::class)->name('admin_clases');*/
route::get('inscritos/{curso}', VerInscritos::class)->name('inscritos');
route::get('admin_validar', ValidarInscripcion::class)->name('admin_validar');

route::get('admin_recetas', IndexAdminrecetas::class)->name('admin_recetas');
route::get('selec_ingredientes/{receta}', SelecIngredientes::class)->name('selec_ingredientes');
route::get('selec_indicaciones/{receta}', SelecIndicaciones::class)->name('selec_indicaciones');
route::get('detallereceta/{receta}', RecetasDetalleReceta::class)->name('detallereceta');

route::get('admin_eventos', IndexAdmineventos::class)->name('admin_eventos');
route::get('selec_parrafos/{evento}', SelecParrafos::class)->name('selec_parrafos');
route::get('detallevento/{evento}', DetalleEvento::class)->name('detallevento');

route::get('admin_slides', IndexAdminslide::class)->name('admin_slides');