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

    /**
     * Get paginated items
     *
     * @param $int
     * @return mixed
     */
    public function getPaginated($int = 15);

    /**
     * Get a user with all of his/her roles
     *
     * @param $id
     * @return User
     */
    public function getUserWithRoles($id);

    /**
     * Update a user by his / her id
     *
     * @param $userId
     * @param $userData
     * @return mixed
     */
    public function updateById($userId, array $userData);
} 
