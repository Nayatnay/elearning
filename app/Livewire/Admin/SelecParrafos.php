<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use App\Models\Parrevento;
use Livewire\Component;

class SelecParrafos extends Component
{
    public $evento, $parrafo, $descripcion;
    public $open_edit = false;

    protected function rules()
    {
        return [
            'descripcion' => 'required',
        ];
    }

    public function mount($evento)
    {
        $this->evento = Evento::find($evento);
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'descripcion']);
    }


    public function edit(Parrevento $parrafo)
    {
        $this->parrafo = $parrafo;
        $this->descripcion = $parrafo->descripcion;
        $this->open_edit = true;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->parrafo->update($validatedData);

        $this->reset(['open_edit', 'descripcion']);  //cierra el modal y limpia los campos del formulario
        $this->dispatch('selec-parrafos');
    }

    public function delete(Parrevento $parrafo)
    {
        $parrafo->delete();
        $this->dispatch('selec-parrafos');
    }

    public function render()
    {
        $evento = $this->evento;
        $parrafos = Parrevento::where('id_evento', '=', $evento->id)->get();

        return view('livewire.admin.selec-parrafos', compact('evento', 'parrafos'));
    }
}
