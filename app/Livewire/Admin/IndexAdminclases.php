<?php

namespace App\Livewire\Admin;

use App\Models\Clase;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class IndexAdminclases extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $buscar, $clase;
    public $open_delete = false;
    public $open_edit = false;
    public $identificador, $video, $tema;
    public $videovo;

    protected function rules()
    {
        return [
            'tema' => 'required',
            'video' => 'required',
        ];
    }

    public function mount(Clase $clase) 
    {
        $this->clase = $clase;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre del video seleccionado anteriormente en el modal
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function delete(clase $clase)
    {
        $this->clase = $clase;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->clase->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-adminclases');
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'tema', 'video']);
        $this->identificador = rand();
    }

    public function edit(Clase $clase)
    {
        //dd($clase->video);
        $this->clase = $clase;
        $this->tema = $clase->tema;
        $this->video = $clase->video;
        $this->open_edit = true;
    }

    public function update()
    {
        if ($this->videovo <> null) {
            $this->video = $this->videovo;
            $fileName = time() . '.' . $this->video->extension();
            $this->video->storeAs('public/clases', $fileName);
            $this->video = $fileName;
        }

        $validatedData = $this->validate();
        $this->clase->update($validatedData);

        $this->videovo = null;

        $this->reset(['open_edit', 'tema', 'video']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('index-adminclases');
    }

    public function render()
    {
        $clases = Clase::where('tema', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(8);

        return view('livewire.admin.index-adminclases', compact('clases'));
    }
}
