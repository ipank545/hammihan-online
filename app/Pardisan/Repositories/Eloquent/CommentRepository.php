<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Comment;
use Pardisan\Repositories\CommentRepositoryInterface;

class CommentRepository extends AbstractRepository implements CommentRepositoryInterface{

    /**
     * @param Comment $commentModel
     */
    public function __construct(
        Comment $commentModel
    ){
        $this->model = $commentModel;
    }
} 
