<?php namespace Pardisan\ServiceProviders; 

use Illuminate\Support\ServiceProvider;
use Pardisan\Support\ValidationSnippets;

class ValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['validator']->extend(
            'integer_array',
            'Pardisan\Support\ValidationSnippets@integerArray'
        );

        $this->app['validator']->resolver(function($translator, $data, $rules, $messages){
            return new ValidationSnippets($translator, $data, $rules, $messages);
        });
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
