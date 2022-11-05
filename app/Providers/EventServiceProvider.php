<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\OrderShipped;
use App\Listeners\SendShipmentNotification;
use App\Events\VideoViewers;
use App\Listeners\IncreaseCount;
use App\Events\SubscribeUsers;
use App\Listeners\IncreaseSubscibes;
use App\Events\userVisitPage;
use App\Listeners\AddVisitPage;
use App\Listeners\UserLog;
use App\Models\User;
use App\Observers\UserObserver;
use App\Events\MailSystemEvent;
use App\Listeners\SendMailSystem;


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
        OrderShipped::class => [
            SendShipmentNotification::class,
        ],
        VideoViewers::class => [
            IncreaseCount::class,
        ],
        SubscribeUsers::class => [
            IncreaseSubscibes::class,
        ],
        userVisitPage::class => [
            AddVisitPage::class,
            UserLog::class
        ],
        MailSystemEvent::class => [
            SendMailSystem::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
