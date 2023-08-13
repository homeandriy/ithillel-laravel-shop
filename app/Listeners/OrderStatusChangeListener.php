<?php

namespace App\Listeners;

use App\Events\OrderStatusChange;
use App\Jobs\OrderStatusChangedNotifyJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderStatusChangeListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderStatusChange $event): void
    {
        OrderStatusChangedNotifyJob::dispatch($event->order, $event->preventStatus)->onQueue('notifications');
    }
}
