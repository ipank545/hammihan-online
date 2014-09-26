<?php namespace Pardisan\Repositories\Eloquent; 

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
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

    /**
     * Get all available roles
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->model->newInstance()->all();
    }

    /**
     * Update a role repo by id
     *
     * @param $id
     * @param array $data
     * @throws UnableToUpdateException
     * @throws \Pardisan\Repositories\Exceptions\NotFoundException
     * @return mixed
     */
    public function updateById($id, array $data)
    {
        try {
            $updateable = $this->findById($id);
            $updateable->name = ! empty($data['name']) ? $data['name'] : $updateable->name;
            $updateable->save();
            return $updateable;
        }catch (QueryException $e){
            throw new UnableToUpdateException($e->getMessage());
        }
    }

    /**
     * Add roles to user
     *
     * @param $user
     * @param $saveableRoles
     * @return mixed
     */
    public function addRolesToUser(User $user, array $saveableRoles)
    {
        $user->roles()->sync($saveableRoles);
        return $user;
    }
}
