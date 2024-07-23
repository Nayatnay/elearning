<?php

namespace App\Livewire\Admin;

use App\Models\Clacurso;
use App\Models\Clase;
use App\Models\Curso;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CrearAdminclases extends Component
{
    use WithFileUploads, WithPagination;

    public $identificador, $descripcion, $video, $curso, $slug;
    public $open = false;

    protected $listeners = ['render'];

    protected $rules = [
        'video' => 'required|file|mimes:mp4|max:102400',
        'descripcion' => 'required|unique:clacursos',
    ];

    public function mount()
    {
        $this->identificador = rand(); // Lo estoy usando para eliminar el nombre de la imagen que se selecciono anteriormente en el modal
    }

    public function cancelar()
    {
        $this->reset(['open', 'descripcion', 'video']);
        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();

        //dd($this->descripcion);

        $this->slug = str::slug($this->descripcion, '-');

        $fileName = time() . '.' . $this->video->extension();
        $this->video->storeAs('public/clases', $fileName);

        Clacurso::create([
            'id_curso' => $this->curso,
            'descripcion' => $this->descripcion,
            'slug' => $this->slug,
            'video' => $fileName,
        ]);

        $curso = $this->curso;

        $this->reset(['open', 'descripcion', 'video']);
        $this->identificador = rand(); // reemplaza el valor del identificador. Reseteará el nombre del video seleccionada anteriormente

        return redirect()->route('selec_clases', compact('curso'));
    }

    public function render()
    {
        return view('livewire.admin.crear-adminclases');
    }
}
