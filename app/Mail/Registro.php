<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class Registro extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $password;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registro',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        $url = URL::route('login');

        return $this->view('email')
                    ->with([
                        'email' => $this->email,
                        'password' => $this->password,
                        'url' => $url
                    ])
                    ->withSubject('Registro Hotel Estelar del Horizonte');
                    ;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
