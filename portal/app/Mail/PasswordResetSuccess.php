<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use function App\Helpers\uc_worlds;

class PasswordResetSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public string $username;

    public string $db;

    public function __construct(string $username, string $db)
    {
        $this->username = $username;
        $this->db = $db;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS', 'noreply@rsc.vet'), env('MAIL_FROM_NAME', 'OpenRSC')),
            replyTo: env('MAIL_FROM_ADDRESS', 'noreply@rsc.vet'),
            subject: 'OpenRSC ('.uc_worlds($this->db).') Password Reset Successful',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.password_reset_success',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
