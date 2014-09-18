<?php namespace Pardisan\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Pardisan\Repositories\LogRepositoryInterface','Pardisan\Repositories\Eloquent\LogRepository');
    }
}