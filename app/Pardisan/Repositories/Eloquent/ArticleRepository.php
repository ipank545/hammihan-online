<?php namespace Pardisan\Repositories\Eloquent;


use Pardisan\Models\Article;
use Pardisan\Models\Category;
use Pardisan\Repositories\ArticleRepositoryInterface;

class ArticleRepository extends AbstractRepository implements ArticleRepositoryInterface {

    public function __construct(Article $model){

        $this->model = $model;
    }

    public function createRaw(array $data){

        return $this->model->newInstance()->create($data);
    }

    public function editById($id, $data){

        $updateable = $this->model->find($id);
        $updateable->first_title = $data['first_title'];
        $updateable->second_title = $data['second_title'];
        $updateable->important_title = $data['important_title'];
        $updateable->summary = $data['summary'];
        $updateable->body = $data['body'];
        $updateable->publish_date = $data['publish_date'];
        $updateable->status_id = $data['status_id'];
        $updateable->author = $data['author'];
        $updateable->user_id = $data['user_id'];

        $updateable->save();
    }


    public function getAll(){
        $disply = $this->model->all();
        return $disply;
    }

    public function bulkDelete(array $deleteables)
    {
        if (empty($deleteables)) return 0;
        return $this->model->newInstance()->whereIn('id', $deleteables)->delete();
    }

    public function getGuestCatArticles($catName, $count = 1)
    {
        $getMethod = $count > 1 ? 'get' : 'first';
        return $this->model->getGuestSafeQuery()->whereHas('category', function($q) use($catName){
            $q->where('name', $catName);
        })->take($count)->{$getMethod}();
    }

    public function guestArticlesForCat(Category $cat, $count = 1)
    {
        $method = $count > 1 ? 'get' : 'first';
        return $cat->articles()->getGuestSafeQuery()->take($count)->{$method}();
    }

    public function loadArticlesWithLargeImage($count = 3)
    {
        return $this->model->newInstance()->whereNotNull('large_image')->orderBy('created_at')->where('large_image', '<>', '')->take($count)->get();
    }

    public function randomHighlighted()
    {
        return $this->model->newInstance()->where('highlighted', true)->first();
    }
}
