<?php namespace Pardisan\Commands\Category\Update; 

class Command
{
    public function __construct(
        $name,
        $slug
    ){
        $this->name = $name;
        $this->slug = $slug;
    }
} 
