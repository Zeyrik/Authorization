<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserInvoiceCreated extends Mailable
{
    use Queueable, SerializesModels;


    public $num;
    public $color_price;
    public $timestamp_from_birthday;

    /**
     * Create a new message instance.
     */
    public function __construct($num, $color_price, $timestamp_from_birthday)
    {
        $this->num = $num;
        $this->color_price = $color_price+1;
        $this->timestamp_from_birthday = $timestamp_from_birthday;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'User Invoice Created',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.UserInvoiceCreated',
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
