<?php

namespace App\Livewire\Index;

use App\Models\Curso;
use App\Models\Imageslide;
use Livewire\Component;

class IndexMain extends Component
{
    public function render()
    {
        $cursos = Curso::where('publicado', '=', 1)->orderBy('id', 'desc')->paginate(8);
        $slides = Imageslide::where('estado', '=', 1)->get();

        return view('livewire.index.index-main', compact('cursos', 'slides'));
    }
}
