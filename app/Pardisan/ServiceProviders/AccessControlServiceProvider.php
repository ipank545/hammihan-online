<?php namespace Pardisan\ServiceProviders; 

use Illuminate\Support\ServiceProvider;

class AccessControlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->make('Pardisan\Support\AccessControl\Contracts\BridgeInterface')->setUserByAuth();
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
                return $app->make('Pardisan\Support\AccessControl\Implementations\AccessControl');
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
