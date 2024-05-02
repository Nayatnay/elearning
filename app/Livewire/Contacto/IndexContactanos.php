<?php

namespace App\Livewire\Contacto;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Livewire\Component;

class IndexContactanos extends Component
{
    public $info;

    protected $listeners = ['render'];

    public function contactousuario(Request $request)
    {
        $nombre = $request->nombre;
        $email = $request->email;
        $mensaje = $request->mensaje;

        $correo = new ContactoMailable($nombre, $email, $mensaje);
        Mail::to('soporte@leconcasse.com')->send($correo);

        return redirect()->route('contacto')->with('info', 'ok');

    }

    public function render()
    {
        return view('livewire.contacto.index-contactanos');
    }
}
