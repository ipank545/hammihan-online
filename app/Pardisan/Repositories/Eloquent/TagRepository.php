<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Tag;
use Pardisan\Repositories\TagRepositoryInterface;

class TagRepository extends AbstractRepository implements TagRepositoryInterface {

    /**
     * @param Tag $tagModel
     */
    public function __construct(
        Tag $tagModel
    ){
        $this->model = $tagModel;
    }
} 
