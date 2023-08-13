<?php

namespace App\Providers;

use App\Events\OrderCreated;
use App\Events\OrderStatusChange;
use App\Listeners\OrderCreatedListener;
use App\Listeners\OrderStatusChangeListener;
use App\Models\Image;
use App\Models\Product;
use App\Observers\ImageObserver;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        Image::class => ImageObserver::class,
        Product::class => ProductObserver::class
    ];
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreated::class => [
            OrderCreatedListener::class
        ],
        OrderStatusChange::class => [
            OrderStatusChangeListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
