    <?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Mail\Mailables\Content;
    use Illuminate\Mail\Mailables\Envelope;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\URL;

    class BienvenidoCliente extends Mailable
    {
        use Queueable, SerializesModels;

        public $nombre;

        /**
         * Create a new message instance.
         */
        public function __construct($nombre)
        {
            $this->nombre = $nombre;
        }

        /**
         * Get the message envelope.
         */
        public function envelope(): Envelope
        {
            return new Envelope(
                subject: 'Bienvenido Cliente',
            );
        }

        /**
         * Get the message content definition.
         */
        public function content()
        {
            return $this->view('emails.registroEmpleadoCliente')->with('nombre', $this->nombre);
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
