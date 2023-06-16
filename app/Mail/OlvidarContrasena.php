<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OlvidarContrasena extends Mailable
{
    use Queueable, SerializesModels;
    public $enlace;

    // Constructor
    public function __construct($enlace)
    {
        $this->enlace = $enlace;
    }

    // Cuerpo email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cambio Contraseña',
        );
    }

    // Plantilla que va usar el email
    public function build()
    {
        return $this->view('emails.olvidarContrasena')
                    ->with([
                        'url' => $this->enlace,
                    ]);
    }
}
