<?php

namespace App\Livewire\Index;

use App\Models\Curso;
use App\Models\Imageslide;
use App\Models\Suscripcion;
use Livewire\Component;

class IndexMain extends Component
{
    public $info, $email;

    protected $listeners = ['render'];

    protected $rules = [
        'email' => ['required', 'string', 'email', 'max:255', 'unique:suscripcions'],
    ];


    public function mount()
    {
        $this->info = 0;
    }

    public function arch()
    {
        $this->validate();

        Suscripcion::create([
            'email' => $this->email,
        ]);

        $this->info = 1;
    }
    public function render()
    {
        $cursos = Curso::where('publicado', '=', 1)->orderBy('id', 'desc')->paginate(8);
        $slides = Imageslide::where('estado', '=', 1)->get();
        $info = $this->info;

        return view('livewire.index.index-main', compact('cursos', 'slides', 'info'));
    }
}
