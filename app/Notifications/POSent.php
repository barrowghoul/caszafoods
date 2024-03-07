<?php

namespace App\Notifications;

use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class POSent extends Notification implements ShouldQueue
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
        $vias = ['mail', 'database'];
        if(config('settings.use_pusher') === '1'){
            $vias[] = 'broadcast';
        }
        return $vias;
    }

    public function toDatabase() : array {
        $purchaser = User::find($this->purchaseOrder->user_id);
        return [
            'message' => $purchaser->name . ' ha registrado una nueva orden de compra',
            'url' => route('purchase-orders.edit', $this->purchaseOrder->id),
            'title' => 'Nueva orden de compra',
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        $purchaser = User::find($this->purchaseOrder->user_id);
        return new BroadcastMessage([
            'message' => $purchaser->name . ' ha registrado una nueva orden de compra',
            'url' => route('purchase-orders.edit', $this->purchaseOrder->id),
            'title' => 'Nueva orden de compra',
        ]);

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
