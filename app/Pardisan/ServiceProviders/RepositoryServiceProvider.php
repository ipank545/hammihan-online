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
        $this->app->bind(
            'Pardisan\Repositories\LogRepositoryInterface',
            'Pardisan\Repositories\Eloquent\LogRepository'
        );

        $this->app->bind(
            'Pardisan\Repositories\UserRepositoryInterface',
            'Pardisan\Repositories\Eloquent\UserRepository'
        );

        $this->app->bind(
            'Pardisan\Repositories\PermissionRepositoryInterface',
            'Pardisan\Repositories\Eloquent\PermissionRepository'
        );

        $this->app->bind(
            'Pardisan\Repositories\RoleRepositoryInterface',
            'Pardisan\Repositories\Eloquent\RoleRepository'
        );

        $this->app->bind(
            'Pardisan\Repositories\RepositoryWrapperInterface',
            'Pardisan\Repositories\Eloquent\RepositoryWrapper'
        );
    }
}
