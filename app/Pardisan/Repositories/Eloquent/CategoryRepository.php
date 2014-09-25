<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Category;
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
} 
