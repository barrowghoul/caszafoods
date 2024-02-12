<?php

namespace App\Notifications;

use App\Models\Reception;
use App\Models\VendorInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReceptionDone extends Notification
{
    use Queueable;

    public $reception;

    /**
     * Create a new notification instance.
     */
    public function __construct(Reception $reception)
    {
        $this->reception = $reception;
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

    public function toDatabase() : array {
        $invoice = VendorInvoice::where('reception_id', $this->reception->id)->first();

        return [
            'message' => 'Se ha registrado una nueva factura',
            'title' => 'Nueva Factura de Proveedor',
            'url' => route('receptions.show', $invoice),
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
