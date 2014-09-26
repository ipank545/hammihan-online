<?php namespace Pardisan\Support\AccessControl\Implementations; 

use Pardisan\Models\Article;
use Pardisan\Models\User;
use Pardisan\Repositories\CategoryRepositoryInterface;
use Pardisan\Repositories\PermissionRepositoryInterface;
use Pardisan\Repositories\RoleRepositoryInterface;
use Pardisan\Repositories\StateRepositoryInterface;
use Pardisan\Repositories\UserRepositoryInterface;
use Pardisan\Support\AccessControl\Contracts\AccessControlInterface;

class AccessControl implements AccessControlInterface {

    /**
     * @var User
     */
    protected $user;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;

    /**
     * @var StateRepositoryInterface
     */
    protected $roleRepo;

    /**
     * @var PermissionRepositoryInterface
     */
    protected $permRepo;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $catRepo;

    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;

    /**
     * @param UserRepositoryInterface $userRepo
     * @param StateRepositoryInterface $stateRepo
     * @param RoleRepositoryInterface $roleRepo
     * @param PermissionRepositoryInterface $permRepo
     * @param CategoryRepositoryInterface $cateRepo
     */
    public function __construct(
        UserRepositoryInterface $userRepo,
        StateRepositoryInterface $stateRepo,
        RoleRepositoryInterface $roleRepo,
        PermissionRepositoryInterface $permRepo,
        CategoryRepositoryInterface $cateRepo
    ){
        $this->userRepo = $userRepo;
        $this->stateRepo = $stateRepo;
        $this->roleRepo = $stateRepo;
        $this->permRepo = $permRepo;
        $this->catRepo = $cateRepo;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user; return $this;
    }

    /**
     * @param $catId
     * @return bool
     */
    public function userHasAccessToCategory($catId)
    {
        $userCats = $this->catRepo->getUserCategories($this->getUser())->lists('id');

        return in_array($catId, $userCats);
    }

    /**
     * @param $stateId
     * @return bool
     */
    public function userHasAccessToState($stateId)
    {
        $userRoles = $this->roleRepo->getUserRoles($this->getUser())->lists('id');
        $rolesStates = $this->stateRepo->getStatesOfRoles($userRoles)->lists('id');

        return in_array($stateId, $rolesStates);
    }

    /**
     * @param Article $article
     * @return mixed
     */
    public function articleIsEditable(Article $article)
    {
        return isset($article); // @TODO
    }

    /**
     * @return User
     */
    protected function getUser()
    {
        return $this->user;
    }
} 
