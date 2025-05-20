<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TenantRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $generatedPassword;
    public string $subscription;
    public string $domain;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $generatedPassword, string $subscription, string $domain)
    {
        $this->user = $user;
        $this->generatedPassword = $generatedPassword;
        $this->subscription = $subscription;
        $this->domain = $domain;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to ' . config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tenant_registered',
        );
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
