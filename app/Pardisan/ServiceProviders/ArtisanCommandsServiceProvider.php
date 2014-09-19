<?php namespace Pardisan\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class ArtisanCommandsServiceProvider extends ServiceProvider
{
    /**
     * Use other bindings
     *
     * @return void
     */
    public function boot()
    {
        $this->commands('command.admin_generator');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('command.admin_generator',function($app){
            return $app->make('Pardisan\ArtisanCommands\GenerateAdminCommand');
        });
    }
}
