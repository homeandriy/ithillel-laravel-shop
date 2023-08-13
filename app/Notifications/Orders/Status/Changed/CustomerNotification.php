<?php

namespace App\Notifications\Orders\Status\Changed;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class CustomerNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public Order $order,
        public string $preventStatus
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'telegram'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line("Статус вашого замовлення було змінено з ". OrderStatus::find($this->preventStatus)->getName() . " на " . OrderStatus::find($this->order->status_id)->getName());
    }

    /**
     * @param App\Models\User|object $notifiable
     *
     * @return TelegramMessage|null
     */
    public function toTelegram(object $notifiable)
    {
        \Log::debug(print_r($notifiable, true));
        if ( empty( $notifiable->telegram_id ) ) {
            return null;
        }

        return TelegramMessage::create()
                              ->to( $notifiable->telegram_id )
                              ->content( "Hello, $notifiable->name $notifiable->surname " )
                              ->line( "Статус вашого замовлення було змінено з ". OrderStatus::find($this->preventStatus)->getName() . " на " . OrderStatus::find($this->order->status_id)->getName()  )
                              ->line( 'You can see the invoice file in attachments' );
    }
}
