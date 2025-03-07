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

    public $order;
    public $customerName;
    public $customerEmail;

    public function __construct($order, $customerName, $customerEmail)
    {
        $this->order = $order;
        $this->customerName = $customerName;
        $this->customerEmail = $customerEmail;
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

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->from($this->customerEmail) // Menggunakan email customer sebagai pengirim
            ->subject('Pesanan Baru dari ' . $this->customerName)
            ->view('emails.order_notification')
            ->with([
                'order' => $this->order,
                'customerName' => $this->customerName,
            ]);
    }
}
