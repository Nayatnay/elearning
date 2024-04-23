<?php

namespace App\Livewire\Admin;

use App\Models\Imageslide;
use Livewire\Component;
use Livewire\WithFileUploads;

class IndexAdminslide extends Component
{
    use WithFileUploads;

    public $imgslide, $imagen, $imagenva, $identificador;
    public $open_delete = false;
    public $open_edit = false;

    protected function rules()
    {
        return [
            'imagen' => 'required',
        ];
    }

    public function mount(Imageslide $imgslide)
    {
        $this->imgslide = $imgslide;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal

    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'imagen']);
        $this->identificador = rand();
    }

    public function delete(Imageslide $imgslide)
    {
        $this->imgslide = $imgslide;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->imgslide->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-adminslides');
    }

    public function edit(Imageslide $imgslide)
    {
        $this->imgslide = $imgslide;
        $this->imagen = $imgslide->imagen;
        $this->open_edit = true;
    }

    public function update()
    {
        
        if ($this->imagenva <> null) {
            $this->imagen = $this->imagenva;
            $fileName = time() . '.' . $this->imagen->extension();
            $this->imagen->storeAs('public/diapositivas', $fileName);
            $this->imagen = $fileName;
        }

        $validatedData = $this->validate();
        $this->imgslide->update($validatedData);

        $this->imagenva = null;

        $this->reset(['open_edit', 'imagen']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('index-adminslide');
    }

    public function habilitar(Imageslide $imgslide)
    {
        $imgslide->estado = 1;
        $imgslide->update();
    }

    public function deshabilitar(Imageslide $imgslide)
    {
        $imgslide->estado = 0;
        $imgslide->update();
    }

    public function render()
    {
        $imgslides = Imageslide::all();

        return view('livewire.admin.index-adminslide', compact('imgslides'));
    }
}
