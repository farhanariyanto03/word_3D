<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderNotificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $customerName;

    /**
     * Create a new message instance.
     */
    public function __construct($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Notification Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_notification',
        );
    }

    public function build()
    {
        return $this->subject('Pesanan Baru')
                    ->view('emails.order_notification')
                    ->with(['customerName' => $this->customerName]);
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
