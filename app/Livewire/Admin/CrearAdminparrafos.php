<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use App\Models\Parrevento;
use Livewire\Component;
use Livewire\WithPagination;

class CrearAdminparrafos extends Component
{
    use WithPagination;

    public $parrafo, $descripcion;
    public $evento;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'descripcion' => 'required',
    ];

    public function mount(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function cancelar()
    {
        $this->reset(['open', 'descripcion']);
    }

    public function save()
    {
      
        $this->validate();

        Parrevento::create([
            'id_evento' => $this->evento->id,
            'descripcion' => $this->descripcion,
        ]);

        $evento = $this->evento;

        $this->reset(['open', 'descripcion']);
        return redirect()->route('selec_parrafos', compact('evento'));
    }

    public function render()
    {
        $evento = $this->evento;

        return view('livewire.admin.crear-adminparrafos', compact('evento'));
    }
}
