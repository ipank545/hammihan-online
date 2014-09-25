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

    /**
     * Get all available roles
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Delete by multiple ids
     *
     * @param $deleteables
     * @return int
     */
    public function bulkDelete(array $deleteables);

    /**
     * Update a role repo by id
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateById($id, array $data);

    /**
     * Add roles to user
     *
     * @param $user
     * @param $saveableRoles
     * @return mixed
     */
    public function addRolesToUser(User $user, array $saveableRoles);
}
