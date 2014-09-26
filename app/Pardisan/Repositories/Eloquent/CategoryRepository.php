<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Category;
use Pardisan\Models\User;
use Pardisan\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    /**
     * @param Category $catModel
     */
    public function __construct(Category $catModel)
    {
        $this->model = $catModel;
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
}
