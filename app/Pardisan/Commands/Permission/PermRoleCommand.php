<?php namespace Pardisan\Commands\Permission; 

class PermRoleCommand
{
    public $roles;

    public function __construct(array $roles)
    {
        $this->roles = $roles;
    }
} 
