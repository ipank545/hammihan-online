<?php namespace Pardisan\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Pardisan\Models\Role;

interface PermissionRepositoryInterface {

    /**
     * Get all permissions with their active roles
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPermissionsWithRoles();

    /**
     * Add permissions to role
     *
     * @param Role $role
     * @param array $insertables
     * @return mixed
     */
    public function addPermissionsToRole(Role $role, array $insertables);

    /**
     * Get all
     *
     * @return Collection
     */
    public function getAll();
}
