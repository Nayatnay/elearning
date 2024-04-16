<?php

namespace App\Livewire\Index;

use App\Models\Curso;
use Livewire\Component;

class IndexMain extends Component
{
    public function render()
    {
        $cursos = Curso::where('publicado', '=', 1)->orderBy('id', 'desc')->paginate(8);

        return view('livewire.index.index-main', compact('cursos'));
    }
}
