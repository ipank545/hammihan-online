<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Category;
use Pardisan\Models\Log;
use Pardisan\Models\Role;
use Pardisan\Models\User;
use Pardisan\Repositories\Article;
use Pardisan\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $role;

    /**
     * @param Category $catModel
     * @param Role $role
     */
    public function __construct(Category $catModel, Role $role)
    {
        $this->model = $catModel;
        $this->roleModel = $role;
    }

    public function getUserCategories(User $user)
    {
        return $user->categories()->get();
    }

    public function addCategoriesToUser(User $user, array $categories)
    {
        $user->categories()->sync($categories);
        return $user;
    }

    public function loadUserAvailableCats(User $user)
    {
        return $user->categories()->get();
    }

    public function loadCatsByName(array $cats)
    {
        return $this->model->newInstance()->whereIn('name', $cats)->get();
    }
}
