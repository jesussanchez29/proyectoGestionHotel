<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $mensaje;

    // Constructor
    public function __construct($nombre, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    // Cuerpo email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Formulario de contacto',
        );
    }

    // Plantilla que va usar el email
    public function build()
    {
        return $this->view('emails.correoContacto');
    }
}
