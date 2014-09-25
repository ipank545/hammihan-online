<?php namespace Pardisan\Commands\Category\Store; 

class Command
{
    public $name;
    public $slug;

    public function __construct(
        $name,
        $slug
    ){
        $this->name = $name;
        $this->slug = $slug;
    }
} 
