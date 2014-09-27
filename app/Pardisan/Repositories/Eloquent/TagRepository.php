<?php namespace Pardisan\Repositories\Eloquent; 

use Illuminate\Database\QueryException;
use Pardisan\Models\Article;
use Pardisan\Models\Tag;
use Pardisan\Repositories\Exceptions\InvalidArgumentException;
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

    public function addTagsToArticle(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
        return $article;
    }

    public function findByTagNameOrCreate(array $createable)
    {
        $model = $this->model->newInstance();
        $createable['name'] = str_replace(' ', '',$createable['name']);
        try {
            $find = $model->where('name', $createable['name'])->first();
            if (is_null($find)){
                $find = $model->create($createable);
            }
            return $find;
        }catch (QueryException $e){
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
