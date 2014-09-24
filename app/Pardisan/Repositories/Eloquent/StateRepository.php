<?php namespace Pardisan\Repositories\Eloquent; 

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
}
