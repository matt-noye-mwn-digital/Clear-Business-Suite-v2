<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminInvoiceSavedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'A new invoice has been created',
            'message' => auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new invoice for ' . $this->invoice->client->first_name . ' ' . $this->invoice->client->last_name . ' for £' . $this->invoice->total . '.  The invoice is currently a draft and has not been sent to the client'
        ];
    }
}
