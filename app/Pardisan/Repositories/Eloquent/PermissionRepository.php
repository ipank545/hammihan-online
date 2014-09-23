<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Permission;
use Pardisan\Models\Role;
use Pardisan\Repositories\PermissionRepositoryInterface;

class PermissionRepository extends AbstractRepository implements PermissionRepositoryInterface
{
    /**
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    /**
     * Get all permissions with their active roles
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPermissionsWithRoles()
    {
        return $this->model->newInstance()->with('roles')->get();

    }

    /**
     * Add permissions to role
     *
     * @param Role $role
     * @param array $insertables
     * @return mixed
     */
    public function addPermissionsToRole(Role $role, array $insertables)
    {
        $role->perms()->sync($insertables);
        return $role;
    }
}
