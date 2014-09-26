<?php namespace Pardisan\Support\AccessControl\Contracts; 

use Pardisan\Models\User;

interface AccessControlInterface
{
    public function setUser(User $user);
}
