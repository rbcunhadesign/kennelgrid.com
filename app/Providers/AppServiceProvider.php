<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
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
        $this->configureAssets();
        $this->configureModels();
        $this->configureDatabase();
        $this->configureDate();
        $this->configureVite();
    }

    private function configureAssets(): void
    {
        URL::forceHttps();
    }

    private function configureModels(): void
    {
        Model::unguard();
        Model::shouldBeStrict();
    }

    private function configureDatabase(): void
    {
        DB::prohibitDestructiveCommands($this->app->isProduction());
    }

    private function configureDate(): void
    {
        Date::use(CarbonImmutable::class);
    }

    private function configureVite(): void
    {
        Vite::useAggressivePrefetching();
    }
}
