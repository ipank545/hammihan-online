<?php namespace Pardisan\Commands\Tag\Update; 

class UpdateCommand
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
