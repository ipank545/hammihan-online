<?php namespace Pardisan\Support; 

use Illuminate\Routing\Router;

class Menu
{
    protected $router;
    protected $currentRouteName;

    public function __construct(
        Router $router
    ){
        $this->router = $router;
        $this->currentRouteName = $this->router->currentRouteName();
    }

    public function is($what)
    {
        return $what == $this->currentRouteName ? true : false;
    }
} 
