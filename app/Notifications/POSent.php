<?php

namespace App\Notifications;

use App\Models\PurchaseOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class POSent extends Notification
{
    use Queueable;

    public $purchaseOrder;

    /**
     * Create a new notification instance.
     */
    public function __construct(PurchaseOrder $purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $vendor = $this->purchaseOrder->vendor;
        return (new MailMessage)
                    ->from('no-reply@caszafoods.com.mx', 'Caszafoods')
                    ->subject("Nueva Orden de Compra: " . $this->purchaseOrder->id . " - Caszafoods")
                    /*->greeting($po->vendor->name . ': Se ha registrado una nueva orden de compra')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');*/
                    ->markdown('emails.po-sent', [
                        'purchaseOrder' => $this->purchaseOrder,
                        'vendor' => $vendor,
                        'details' => $this->purchaseOrder->details]);
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
