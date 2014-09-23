<?php namespace Pardisan\Repositories;

use Illuminate\Database\Eloquent\Model;
use Pardisan\Models\User;

interface UserRepositoryInterface {
    /**
     * Create from raw input
     *
     * @param array $data
     * @return Model
     */
    public function createRaw (array $data);

    /**
     * Updating user
     *
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function updateUser (User $user, array $data);
} 
