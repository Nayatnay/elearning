<?php

namespace App\Livewire\Admin;

use App\Models\Clase;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CrearAdminclases extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $identif_poster, $tema, $video, $poster;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'tema' => 'required',
        'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100,max_width=640,max_height=480|max:2048',
        'video' => 'required|file|mimes:mp4|max:102400',
    ];

    public function mount() // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    {
        $this->identificador = rand();
        $this->identif_poster = rand();
    }

    public function cancelar()
    {
        $this->reset(['open', 'tema', 'video', 'poster']);
        $this->identificador = rand();
        $this->identif_poster = rand();
    }

    public function save()
    {
        $this->validate();

        $fileName = time() . '.' . $this->poster->extension();
        $this->poster->storeAs('public/clases', $fileName);

        $fileNamevid = time() . '.' . $this->video->extension();
        $this->video->storeAs('public/clases', $fileNamevid);

        Clase::create([
            'tema' => $this->tema,
            'poster' => $fileName,
            'video' => $fileNamevid,
        ]);

        $this->reset(['open', 'tema', 'video', 'poster']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre del video seleccionada anteriormente
        $this->identif_poster = rand(); // reemplaza el valor del identificador. Reseteará el nombre de la imagen seleccionada anteriormente
        return redirect()->route('admin_clases');
    }

    public function render()
    {
        return view('livewire.admin.crear-adminclases');
    }
}
