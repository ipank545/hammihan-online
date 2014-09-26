<?php namespace Pardisan\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class AccessControlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['access_control']->setUserByAuth();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared(
            'Pardisan\Support\AccessControl\Contracts\AccessControlInterface',
            function($app){
                $app->make('Pardisan\Support\AccessControl\Implementations\AccessControl');
            }
        );

        $this->app->bindShared(
            'Pardisan\Support\AccessControl\Contracts\BridgeInterface',
            function($app){
                return $app->make('Pardisan\Support\AccessControl\Implementations\AclBridge');
            }
        );
    }
}
