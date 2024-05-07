<?php

namespace App\Livewire\Admin;

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class IndexAdmineventos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $buscar, $evento;
    public $open_delete = false;
    public $open_edit = false;
    public $identificador, $imagen, $nombre;
    public $imagenva;
    
    protected function rules()
    {
        return [
            'nombre' => 'required',
            'imagen' => 'required',
        ];
    }

    public function mount(Evento $evento) 
    {
        $this->evento = $evento;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
        
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'nombre', 'imagen']);
        $this->identificador = rand();
    }

    public function delete(evento $evento)
    {
        $this->evento = $evento;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->evento->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-admineventos');
    }

    public function edit(Evento $evento)
    {
        $this->evento = $evento;
        $this->nombre = $evento->nombre;
        $this->imagen = $evento->imagen;
        $this->open_edit = true;
    }

    public function update()
    {
        if ($this->imagenva <> null) {
            $this->imagen = $this->imagenva;
            $fileName = time() . '.' . $this->imagen->extension();
            $this->imagen->storeAs('public/eventos', $fileName);
            $this->imagen = $fileName;
        }

        $validatedData = $this->validate();
        $this->evento->update($validatedData);

        $this->imagenva = null;

        $this->reset(['open_edit', 'nombre', 'imagen']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('index-admineventos');
    }

    public function notificacion($evento)
    {
        dd($evento);
    }

    public function render()
    {
        $eventos = Evento::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orwhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(5);

        return view('livewire.admin.index-admineventos', compact('eventos'));
    }
}
