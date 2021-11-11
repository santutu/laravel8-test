<?php

namespace App\Providers;

use App\Domain\Contents\Events\ContentCreatedEvent;
use App\Domain\Contents\Listeners\ContentCreatedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function discoverEventsWithin(): array
    {
        return [
            $this->app->path('Listeners'),
            $this->app->path('Domain'),
        ];
    }

    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
