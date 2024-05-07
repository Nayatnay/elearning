<?php

namespace App\Livewire\Empleos;

use App\Mail\SolicitudempleoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class IndexEmpleos extends Component
{
    use WithFileUploads;

    public $identificador, $archivo;

    public function mount() // Lo estoy usando para eliminar el nombre deL ARCHIVO seleccionado anteriormente en el modal
    {
        $this->identificador = rand();
    }

    public function solicitud(Request $request)
    {
        //$url = Storage::url($request->archivo);
        //dd($request->archivo);

        $nombre = $request->nombre;
        $email = $request->email;
        $telf = $request->telf;
        $fechanac = $request->fechanac;
        $archivo =$request->archivo;

        $correo = new SolicitudempleoMailable($nombre, $email, $telf, $fechanac, $archivo);
        Mail::to('soporte@leconcasse.com')->send($correo);

        return redirect()->route('index_empleos')->with('info', 'ok');
    }

    public function render()
    {
        return view('livewire.empleos.index-empleos');
    }
}
