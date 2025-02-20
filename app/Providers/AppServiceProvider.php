<?php

namespace App\Providers;

use App\Models\Chat;
use App\Models\Message;
use App\Observers\ChatObserver;
use App\Observers\MessageObserver;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Date::use(CarbonImmutable::class);

        Message::observe(MessageObserver::class);
        Chat::observe(ChatObserver::class);
    }
}
