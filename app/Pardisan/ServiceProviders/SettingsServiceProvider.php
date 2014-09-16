<?php namespace Pardisan\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider {

    /**
     * Use other available app resources
     *
     * @return void
     */
    public function boot ()
    {
        $this->app->before('Pardisan\Support\Settings@perform');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}