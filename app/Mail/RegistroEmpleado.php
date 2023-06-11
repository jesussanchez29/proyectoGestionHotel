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

        return $this->view('emails.registroEmpleado')
            ->with([
                'email' => $this->email,
                'password' => $this->password,
                'url' => $url
            ]);
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
