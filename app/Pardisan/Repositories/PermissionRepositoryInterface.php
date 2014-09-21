<?php namespace Pardisan\Repositories;

interface PermissionRepositoryInterface {

    /**
     * Get all permissions with their active roles
     *
     * @return \Illuminate\Support\Collection
     */
    public function getPermissionsWithRoles();
}
