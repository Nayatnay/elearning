<?php

namespace App\Livewire\Admin;

use App\Models\Ingrediente;
use App\Models\Receta;
use Livewire\Component;
use Livewire\WithPagination;

class CrearAdminingredientes extends Component
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

        Ingrediente::create([
            'id_receta' => $this->receta->id,
            'descripcion' => $this->descripcion,
        ]);

        $receta = $this->receta;

        $this->reset(['open', 'descripcion']);
        return redirect()->route('selec_ingredientes', compact('receta'));
    }

    public function render()
    {
        $receta = $this->receta;

        return view('livewire.admin.crear-adminingredientes', compact('receta'));
    }
}
