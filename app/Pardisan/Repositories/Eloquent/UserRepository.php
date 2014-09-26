<?php namespace Pardisan\Repositories\Eloquent; 

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Pardisan\Models\User;
use Pardisan\Repositories\Exceptions\InvalidArgumentException;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface {
    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Updating user
     *
     * @param User $user
     * @param array $data
     * @return mixed
     */
    public function updateUser(User $user, array $data)
    {
        $user->name = isset($data['name']) ? $data['name'] : $user->name;
        $user->user_name = $data['user_name'];
        $user->email = $data['email'];
        $user->password = isset($data['password']) ? $data['password'] : $user->password;
        $user->voip_id = isset($data['voip_id']) ? $data['voip_id'] : $user->voip_id;
        $user->phone = isset($data['phone']) ? $data['phone'] : $user->phone;
        $user->save();
        return $user;
    }

    /**
     * Get a user with all of his/her roles
     *
     * @param $id
     * @throws NotFoundException
     * @return User
     */
    public function getUserWithRoles($id)
    {
        try {
            $user = $this->model->newInstance()->findOrFail($id);
            $user->load('roles');
            return $user;
        }catch (ModelNotFoundException $e){
            throw new NotFoundException($e->getMessage());
        }
    }

    /**
     * Update a user by his / her id
     *
     * @param $userId
     * @param array $userData
     * @throws InvalidArgumentException
     * @throws NotFoundException
     * @return mixed
     */
    public function updateById($userId, array $userData)
    {
        try {
            $user = $this->model->newInstance()->findOrFail($userId);
            $user->name = $userData['name'];
            $user->user_name = $userData['user_name'];
            $user->password = !empty($userData['password']) ? $userData['password'] : $user->password;
            $user->voip_id = $userData['voip_id'];
            $user->phone = $userData['phone'];
            $user->email = $userData['email'];
            $user->save();
            return $user;
        }catch (ModelNotFoundException $e){
            throw new NotFoundException($e->getMessage());
        }catch(QueryException $e){
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
