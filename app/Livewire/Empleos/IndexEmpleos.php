<?php

namespace App\Livewire\Empleos;

use App\Mail\SolicitudempleoMailable;
use BaconQrCode\Renderer\Path\Path;
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
        $request->validate([
            'archivo' => "required|mimes:pdf|max:10000",
        ]);

        $nombre = $request->nombre;
        $email = $request->email;
        $telf = $request->telf;
        $fechanac = $request->fechanac;
        $archivo = $request->archivo; 
        $filename = $archivo->getClientOriginalName();//toma el nombre del archivo tal como esta en el disco

        $archivo->storeAs('cv', $filename); //Recibe la ruta o carpeta donde se guarda, nombre del archivo y el disco donde se ecuentra
        
        $archivo = $filename;
        
        $correo = new SolicitudempleoMailable($nombre, $email, $telf, $fechanac, $archivo);
        Mail::to('soporte@leconcasse.com')->send($correo);

        return redirect()->route('empleos')->with('info', 'ok');
    }

    public function render()
    {
        return view('livewire.empleos.index-empleos');
    }
}
