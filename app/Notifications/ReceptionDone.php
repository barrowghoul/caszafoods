<?php

namespace App\Notifications;

use App\Models\Reception;
use App\Models\VendorInvoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ReceptionDone extends Notification implements ShouldQueue
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
        $vias = ['database'];
        if(config('settings.use_pusher') === '1'){
            $vias[] = 'broadcast';
        }
        //dd($vias);
        return $vias;
    }

    public function toDatabase() : array {
        $invoice = VendorInvoice::where('reception_id', $this->reception->id)->first();

        return [
            'message' => 'Se ha registrado una nueva factura',
            'title' => 'Nueva Factura de Proveedor',
            'url' => route('vendor-invoices.edit', $invoice),
        ];
    }

    public function toBoradcast(object $notifiable): BroadcastMessage
    {
        $invoice = VendorInvoice::where('reception_id', $this->reception->id)->first();

        return new BroadcastMessage([
            'message' => 'Se ha registrado una nueva factura',
            'title' => 'Nueva Factura de Proveedor',
            'url' => route('vendor-invoices.edit', $invoice),
        ]);
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
