<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;

class SolicitudempleoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre, $email, $telf, $fechanac, $archivo;
    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $email, $telf, $fechanac, $archivo)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telf = $telf;
        $this->fechanac = $fechanac;
        $this->archivo = $archivo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitud de empleo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'correos.solicitudempleo',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [Attachment::fromPath('..\storage\app\cv/' . $this->archivo),];
    }
}
