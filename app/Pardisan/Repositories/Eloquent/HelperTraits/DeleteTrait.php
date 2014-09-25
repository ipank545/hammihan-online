<?php namespace Pardisan\Repositories\Eloquent\HelperTraits; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\Exceptions\RepositoryException;
use Pardisan\Repositories\Exceptions\RepositoryRelationException;

trait DeleteTrait {
    /**
     * Delete an item from Repository
     *
     * @param $id
     * @throws NotFoundException
     * @return bool|null
     */
    public function delete($id)
    {
        $model = $this->model->newInstance();
        $model = $model->find($id);
        if(is_null($model)){
            throw new NotFoundException("Not item with id : [{$id}] found");
        }
        return $model->delete();
    }

    /**
     * Delete an eloquent model based on id
     *
     * @param $id
     * @throws NotFoundException
     * @return bool|null
     */
    public function deleteById($id)
    {
        return $this->delete($id);
    }

    /**
     * Delete a model with instance of model given
     *
     * @param Model $model
     * @throws RepositoryException
     * @throws \Exception
     */
    public function deleteByModel(Model $model)
    {
        try {
            $model->delete();
            return $model;
        }catch (QueryException $e) {
            throw new RepositoryException($e->getMessage());
        }
    }

    /**
     * Delete by multiple ids
     *
     * @param array $deleteables
     * @throws RepositoryRelationException
     * @return int
     */
    public function bulkDelete(array $deleteables)
    {
        try {
            if (! empty($deleteables)){
                return $this->model->newInstance()->whereIn('id', $deleteables)->delete();
            }
        }catch (QueryException $e){
            $err = new RepositoryRelationException();
            $err->setDriverException($e);
            throw new RepositoryRelationException($err->getDriverErrorMessage());
        }
    }
} 
