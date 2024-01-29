<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequisitionSent extends Notification implements ShouldQueue
{
    use Queueable;

    public $requisition;

    /**
     * Create a new notification instance.
     */
    public function __construct($requisition)
    {
        $this->requisition = $requisition;
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
        $requestor = User::find($this->requisition->user_id);
        return (new MailMessage)
                    ->subject("Se ha creada una nueva requisición:" . $this->requisition->id)
                    ->greeting('Se ha registrado una nueva requisición')
                    ->line($requestor->name . ' ha creado una nueva requisición.')
                    ->action('Requisición ' . $this->requisition->id, url( route('requisitions.show',$this->requisition->id)))
                    ->line('Porfavor no responda a esta dirección de correo, este mailbox es usado solo para enviar correos automáticos.');
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
