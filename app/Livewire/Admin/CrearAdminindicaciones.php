<?php

namespace App\Livewire\Admin;

use App\Models\Indicacion;
use App\Models\Receta;
use Livewire\Component;
use Livewire\WithPagination;

class CrearAdminindicaciones extends Component
{
    use WithPagination;

    public $descripcion;
    public $receta;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'descripcion' => 'required',
    ];

    public function mount(Receta $receta)
    {
        $this->receta = $receta;
    }

    public function cancelar()
    {
        $this->reset(['open', 'descripcion']);
    }

    public function save()
    {
        $this->validate();

        Indicacion::create([
            'id_receta' => $this->receta->id,
            'descripcion' => $this->descripcion,
        ]);

        $receta = $this->receta;

        $this->reset(['open', 'descripcion']);
        return redirect()->route('selec_indicaciones', compact('receta'));
    }

    public function render()
    {
        $receta = $this->receta;
        
        return view('livewire.admin.crear-adminindicaciones', compact('receta'));
    }
}
