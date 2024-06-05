<?php

namespace App\Livewire\Admin;

use App\Models\Receta;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class IndexAdminrecetas extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $buscar, $receta;
    public $open_delete = false;
    public $open_edit = false;
    public $identificador, $imagen, $nombre, $descripcion, $tiempo, $porciones, $slug;
    public $imagenva;
    public $chequeo;

    protected function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'tiempo' => 'required',
            'porciones' => 'required',
            'imagen' => 'required',
        ];
    }

    public function mount(Receta $receta) 
    {
        $this->receta = $receta;
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
        
    }

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function cancelar()
    {
        $this->reset(['open_edit', 'nombre', 'descripcion', 'tiempo', 'porciones', 'imagen']);
        $this->identificador = rand();
    }

    public function delete(Receta $receta)
    {
        $this->receta = $receta;
        $this->open_delete = true;
    }

    public function destroy()
    {
        $this->receta->delete();
        $this->reset(['open_delete']);  //cierra el modal     
        $this->dispatch('index-adminrecetas');
    }

    public function edit(Receta $receta)
    {
        $this->receta = $receta;
        $this->nombre = $receta->nombre;
        $this->descripcion = $receta->descripcion;
        $this->tiempo = $receta->tiempo;
        $this->porciones = $receta->porciones;
        $this->imagen = $receta->imagen;
        $this->open_edit = true;
    }

    public function update()
    {
        if ($this->imagenva <> null) {
            $this->imagen = $this->imagenva;
            $fileName = time() . '.' . $this->imagen->extension();
            $this->imagen->storeAs('public/recetas', $fileName);
            $this->imagen = $fileName;
        }

        $this->receta->slug = str::slug($this->nombre, '-');

        $validatedData = $this->validate();
        $this->receta->update($validatedData);

        $this->imagenva = null;

        $this->reset(['open_edit', 'nombre', 'descripcion', 'imagen']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('index-adminrecetas');
    }

    public function render()
    {
        $recetas = Receta::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orwhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(5);

        return view('livewire.admin.index-adminrecetas', compact('recetas'));
    }
}
