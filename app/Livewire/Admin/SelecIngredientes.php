<?php

namespace App\Livewire\Admin;

use App\Models\Ingrediente;
use App\Models\Receta;
use Livewire\Component;

class SelecIngredientes extends Component
{
    public $receta, $descripcion, $ingrediente;
    public $open_edit = false;

    protected function rules()
    {
        return [
            'descripcion' => 'required',
        ];
    }

    public function mount($receta)
    {
        $this->receta = Receta::find($receta);
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion']);
    }

    public function edit(Ingrediente $ingrediente)
    {
        $this->ingrediente = $ingrediente;
        $this->descripcion = $ingrediente->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->ingrediente->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario
        $this->dispatch('selec-ingredientes');
    }

    public function delete(Ingrediente $ingrediente)
    {
        $this->ingrediente = $ingrediente;
        $this->ingrediente->delete();
        $this->dispatch('selec-ingredientes');
    }

    public function render()
    {
        $receta = $this->receta;
        $ingredientes = Ingrediente::where('id_receta', '=', $receta->id)->get();

        return view('livewire.admin.selec-ingredientes', compact('receta', 'ingredientes'));
    }
}
