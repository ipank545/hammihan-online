<?php namespace Pardisan\Repositories\Eloquent;

use Pardisan\Repositories\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {

    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function create(array $data)
    {
        return $this->model->newInstance()->create($data);
    }

    public function findById($id)
    {
       $found = $this->model->newInstance()->find($id);
       if (!is_null($found)) return $found;
        throw new NotFoundException;("Item with id {$id} not found");
    }
}