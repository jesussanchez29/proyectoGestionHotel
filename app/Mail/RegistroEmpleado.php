<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class RegistroEmpleado extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $password;

    // Constructor
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    // Cuerpo email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registro',
        );
    }

    // Plantilla que va usar el email
    public function build()
    {
        $url = URL::route('login');

        return $this->view('emails.registroEmpleado')
            ->with([
                'email' => $this->email,
                'password' => $this->password,
                'url' => $url
            ]);
    }
}
