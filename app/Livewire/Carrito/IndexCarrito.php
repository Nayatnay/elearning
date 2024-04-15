<?php

namespace App\Livewire\Carrito;

use App\Models\Curso;
use Livewire\Component;

class IndexCarrito extends Component
{
    public function add()
    {
        dd('listo');
    }
    public function render()
    {
        $cursos = Curso::all();
        return view('livewire.carrito.index-carrito', compact('cursos'));
    }
}
