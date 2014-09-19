<?php namespace Pardisan\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface {
    /**
     * Create from raw input
     *
     * @param array $data
     * @return Model
     */
    public function createRaw (array $data);
} 
