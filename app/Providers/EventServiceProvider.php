<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\ArticlesEventListener;
use App\Events\ArticleCreated;
use App\Events\ArticlesEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    /*
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
    */
    protected $listen =[
      ArticlesEvent::class=>[
        ArticlesEventListener::class,
      ],
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //Event::listen('article.created',ArticlesEventListener::class);
        Event::listen(ArticleCreated::class,ArticlesEventListener::class);
    }
}
