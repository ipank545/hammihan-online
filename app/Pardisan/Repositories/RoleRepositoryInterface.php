<?php namespace Pardisan\Repositories; 

use Pardisan\Models\Role;
use Pardisan\Models\User;

interface RoleRepositoryInterface
{
    /**
     * Add roles to user
     *
     * @param $user
     * @param $role
     * @return mixed
     */
    public function addRoleToUser(User $user, Role $role);
}
