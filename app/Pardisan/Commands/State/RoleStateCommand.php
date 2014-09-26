<?php namespace Pardisan\Commands\State; 

class RoleStateCommand
{
    public $roles;

    public function __construct(
        $roles = null
    ){
        $this->roles = $roles;
    }
} 
