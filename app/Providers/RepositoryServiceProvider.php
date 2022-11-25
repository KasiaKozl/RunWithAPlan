<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\QuoteRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(QuoteRepository::class);
        $this->app->bind(PlanningRepository::class);
        $this->app->bind(UserRepository::class);
        $this->app->bind(FormRepository::class);
        $this->app->bind(RoleRepository::class);

}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
