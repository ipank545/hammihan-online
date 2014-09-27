<?php namespace Pardisan\Support\AccessControl\Implementations; 

use Illuminate\Auth\AuthManager;
use Pardisan\Models\User;
use Pardisan\Repositories\UserRepositoryInterface;
use Pardisan\Support\AccessControl\Contracts\AccessControlInterface;
use Pardisan\Support\AccessControl\Contracts\BridgeInterface;

class AclBridge implements BridgeInterface
{
    /**
     * @var array admin roles
     */
    protected $admins = ['admin'];

    /**
     * @var array admin users
     */
    protected $adminUsers = ['pcfeeler@gmail.com'];

    /**
     * User to check access against
     *
     * @var User
     */
    protected $user;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;

    /**
     * @var AuthManager
     */
    protected $auth;

    /**
     * @param UserRepositoryInterface $userRepo
     * @param AuthManager $auth
     * @param AccessControlInterface $boss
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        AuthManager $auth,
        AccessControlInterface $boss
    ){
        $this->userRepo = $userRepo;
        $this->boss = $boss;
        $this->auth = $auth;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->boss->setUser($user);
        $this->user = $user; return $this;
    }

    /**
     * Set user by auth
     *
     * @return $this
     */
    public function setUserByAuth()
    {
        if ($this->auth->check()){
            return $this->setUser($this->auth->user());
        }
    }

    /**
     * Call the method from the boss
     *
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        if ($this->canByPass()){
            return true;
        }

        return call_user_func_array(
            [$this->boss, $method],
            $args
        );
    }

    /**
     * User can by pass or not
     *
     * @return bool
     */
    public function canByPass()
    {
        if (is_null($this->user)) return false;

        $user = $this->user;
        foreach($this->getAdminUsers() as $adminUser) {
            if ($user->name == $adminUser || $user->email == $adminUser) return true;
        }

        foreach($this->user->roles as $role){
            if (in_array($role->name, $this->getAdminRoles())) return true;
        }
        return false;
    }

    /**
     * Set user by id
     *
     * @param $id
     * @return $this
     */
    public function setUserById($id)
    {
        $user = $this->userRepo->findById($id);
        return $this->setUser($user);
    }

    /**
     * Get admin roles
     *
     * @return array
     */
    protected function getAdminRoles()
    {
        return $this->admins;
    }

    /**
     * Get admin users
     *
     * @return array
     */
    protected function getAdminUsers()
    {
        return $this->adminUsers;
    }
}
