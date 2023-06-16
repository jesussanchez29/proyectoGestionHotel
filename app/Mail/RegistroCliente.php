<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistroCliente extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;

    // Constructor
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    // Cuerpo email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registro Estela del Horizonte',
        );
    }

    // Plantilla que va usar el email
    public function build()
    {
        return $this->view('emails.registroCliente')->with([
            'nombre' => $this->nombre
        ]);;
    }
}
