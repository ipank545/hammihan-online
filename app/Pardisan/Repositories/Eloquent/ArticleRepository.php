<?php namespace Pardisan\Repositories\Eloquent;


use Pardisan\Models\Article;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface {

    public function __construct(Article $model){

        $this->model = $model;
    }
}