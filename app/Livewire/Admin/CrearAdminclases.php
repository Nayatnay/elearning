<?php

namespace App\Livewire\Admin;

use App\Models\Clase;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CrearAdminclases extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $tema, $video;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'tema' => 'required',
        'video' => 'required|file|mimes:mp4|max:102400',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'tema', 'video']);
        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();

        $fileName = time() . '.' . $this->video->extension();
        $this->video->storeAs('public/clases', $fileName);

        Clase::create([
            'tema' => $this->tema,
            'video' => $fileName,
        ]);

        $this->reset(['open', 'tema', 'video']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre del video seleccionada anteriormente
        return redirect()->route('admin_clases');
    }

    public function render()
    {
        return view('livewire.admin.crear-adminclases');
    }
}
