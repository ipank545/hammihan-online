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
}
