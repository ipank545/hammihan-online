<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Role;
use Pardisan\Models\User;
use Pardisan\Repositories\RoleRepositoryInterface;

class RoleRepository extends AbstractRepository implements RoleRepositoryInterface
{
    /**
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * Add roles to user
     *
     * @param $user
     * @param $role
     * @return mixed
     */
    public function addRoleToUser(User $user, Role $role)
    {
        $user->attachRole($role);
        return $user;
    }
}
