<?php

namespace App\Livewire\Admin;

use App\Mail\SuscripcionesMailable;
use App\Models\Evento;
use App\Models\Suscripcion;
use Illuminate\Support\Facades\Mail;
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
    public $identificador, $imagen, $nombre, $email, $registrar;
    public $imagenva;

    protected function rules()
    {
        return [
            'nombre' => 'required',
            'imagen' => 'required',
            'registrar' => 'required',
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
        $this->reset(['open_edit', 'nombre', 'imagen', 'registrar']);
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
        if ($evento->registrar == 0) {
            $this->registrar = null;
        } else {
            $this->registrar = true;
        }

        $this->open_edit = true;
    }

    public function update()
    {
        //dd($this->registrar);

        if ($this->imagenva <> null) {
            $this->imagen = $this->imagenva;
            $fileName = time() . '.' . $this->imagen->extension();
            $this->imagen->storeAs('public/eventos', $fileName);
            $this->imagen = $fileName;
        }

        if ($this->registrar == true) {
            $this->registrar = 1;
        } else {
            $this->registrar = 0;
        }

        $validatedData = $this->validate();
        $this->evento->update($validatedData);

        $this->imagenva = null;

        $this->reset(['open_edit', 'nombre', 'imagen', 'registrar']);  //cierra el modal y limpia los campos del formulario
        $this->identificador = rand();
        $this->dispatch('index-admineventos');
    }

    public function notificacion(Evento $evento)
    {
        $this->evento = $evento;

        $nombre = $this->evento->nombre;
        $imagen = $this->evento->imagen;

        $suscriptores = Suscripcion::all();
        //dd($suscriptores);
        if ($suscriptores <> null) {
            foreach ($suscriptores as $suscrip) {
                $email = $suscrip->email;
                $correo = new SuscripcionesMailable($imagen, $nombre, $email);
                Mail::to($email)->send($correo);
            }
        }
    }

    public function render()
    {
        $eventos = Evento::where('nombre', 'LIKE', '%' . $this->buscar . '%')
            ->orwhere('descripcion', 'LIKE', '%' . $this->buscar . '%')
            ->orderBy('id', 'desc')->paginate(5);

        return view('livewire.admin.index-admineventos', compact('eventos'));
    }
}
