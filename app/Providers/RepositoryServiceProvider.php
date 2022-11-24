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
