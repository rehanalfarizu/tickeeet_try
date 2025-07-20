<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationRejected extends Mailable
{
    use Queueable, SerializesModels;

    public Registration $registration;

    /**
     * Create a new message instance.
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $eventName = $this->registration->event?->name ?? 'Event';

        return new Envelope(
            subject: 'Registration Status Update - ' . $eventName,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Ensure event relationship is loaded
        if (!$this->registration->relationLoaded('event')) {
            $this->registration->load('event');
        }

        return new Content(
            view: 'emails.registration-rejected',
            with: [
                'registration' => $this->registration,
                'event' => $this->registration->event,
            ],
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
