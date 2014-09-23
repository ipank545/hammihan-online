<?php namespace Pardisan\Repositories\Eloquent;


use Pardisan\Models\Article;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;
use Bigsinoos\JEloquent\PersianDateTrait;
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

    public function deleteById($id){

        $dleable = $this->model->find($id);
        $dleable->delete();
    }

    public function getAll(){
        $disply = $this->model->all();
        return $disply;
    }
}