<?php

namespace App\Notifications\Orders\Created;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Services\Contracts\InvoicesServiceContract;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use Storage;

class CustomerNotification extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct( protected InvoicesServiceContract $invoicesService ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( object $notifiable ): array {
        return [ 'mail', 'telegram' ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail( object $notifiable ): MailMessage {
        /** @var Order $notifiable */
        logs()->info( self::class );

        $invoice = $this->invoicesService->generate( $notifiable );

        return ( new MailMessage )
            ->subject( "Thank you $notifiable->name $notifiable->surname for buying product!" )
            ->greeting( "Hello, $notifiable->name $notifiable->surname" )
            ->line( 'Your order was created!' )
            ->lineIf(
                $notifiable->status->getName() === OrderStatus::Paid->value,
                'And successfully paid!'
            )
            ->line( 'You can see the invoice file in attachments' )
            ->attach( Storage::disk( 'public' )->path( $invoice->filename ), [
                'as'   => $invoice->filename,
                'mime' => 'application/pdf'
            ] );
//                    ->action('Notification Action', url('/'))
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray( object $notifiable ): array {
        return [
            //
        ];
    }

    public function toTelegram( $notifiable ) {
        if ( ! empty( $notifiable->user->telegram_id ) ) {
            return null;
        }

        return TelegramMessage::create()
                              ->to( $notifiable->user->telegram_id )
                              ->content( "Hello, $notifiable->name $notifiable->surname " )
                              ->line( 'Your order was created!' )
                              ->line( 'You can see the invoice file in attachments' );
    }
}
