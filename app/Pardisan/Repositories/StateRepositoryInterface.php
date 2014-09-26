<?php namespace Pardisan\Repositories;

use Pardisan\Models\State;

interface StateRepositoryInterface {
    /**
     * Do update
     *
     * @param State $state
     * @param array $data
     * @return mixed
     */
    public function update(State $state, array $data);
} 
