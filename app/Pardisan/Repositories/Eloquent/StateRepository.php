<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Role;
use Pardisan\Models\State;
use Pardisan\Repositories\StateRepositoryInterface;

class StateRepository extends AbstractRepository implements StateRepositoryInterface
{
    /**
     * @param State $stateModel
     */
    public function __construct(State $stateModel)
    {
        $this->model = $stateModel;
    }

    /**
     * Do update
     *
     * @param State $state
     * @param array $data
     * @return mixed
     */
    public function update(State $state, array $data)
    {
        $state->fill($data);
        $state->save();
        return $state;
    }

    public function getAllWithRoles()
    {
        return $this->model->newInstance()->with('roles')->orderBy('priority')->get();
    }

    public function addStatesToRole(Role $role, array $insertables)
    {
        $role->states()->sync($insertables);
        return $role;
    }
}
