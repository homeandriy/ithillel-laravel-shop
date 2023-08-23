<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\User;
use App\Notifications\Orders\Status\Changed\CustomerNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class OrderStatusChangedNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Order $order,
        public string $preventStatus
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Notification::send(
            User::findOrFail($this->order->user()->get()),
            app()->make(CustomerNotification::class,
                [
                    'order' => $this->order,
                    'preventStatus' => $this->preventStatus
                ]
            )
        );
    }
}
