<?php

namespace App\Providers;

use App\Models\Message;
use App\Observers\MessageObserver;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
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
        $this->configureCommands();
        $this->configureObservers();
        $this->configureDate();
        $this->configureUrl();
        $this->configureVite();
    }

    private function configureVite(): void
    {
        Vite::usePrefetchStrategy('aggressive');
    }

    private function configureUrl(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }

    private function configureDate(): void
    {
        Date::use(CarbonImmutable::class);
    }

    private function configureObservers(): void
    {
        Message::observe(MessageObserver::class);
    }

    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands($this->app->environment('production'));
    }
}
