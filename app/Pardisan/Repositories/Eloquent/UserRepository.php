<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\User;
use Pardisan\Repositories\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface {
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
} 
