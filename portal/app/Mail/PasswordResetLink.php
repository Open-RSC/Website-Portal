<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use function App\Helpers\uc_worlds;

class PasswordResetLink extends Mailable
{
    use Queueable, SerializesModels;

    public string $url;

    public string $token;

    public string $username;

    public string $db;

    public function __construct(string $url, string $token, string $username, string $db)
    {
        $this->url = $url;
        $this->token = $token;
        $this->username = $username;
        $this->db = $db;
    }

    public function envelope(): Envelope
    {
        // Warning: some SMTP providers will not allow a custom from address, only a custom from name, which can lead to email address exposure.
        $fromAddress = env('MAIL_FROM_ADDRESS', 'noreply@rsc.vet');
        $fromName = env('MAIL_FROM_NAME', 'OpenRSC');

        return new Envelope(
            from: new Address($fromAddress, $fromName),
            replyTo: $fromAddress,
            subject: 'OpenRSC ('.uc_worlds($this->db).') Password Reset Request',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.password_reset_link',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
