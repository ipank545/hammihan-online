<?php namespace Pardisan\Repositories\Eloquent;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Pardisan\Exceptions\PardisanException;
use Pardisan\Repositories\Eloquent\HelperTraits\DeleteTrait;
use Pardisan\Repositories\Eloquent\HelperTraits\SearchTrait;
use Pardisan\Repositories\Exceptions\InvalidArgumentException;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\Model;
use Pardisan\Repositories\Exceptions\RepositoryException;

abstract class AbstractRepository {

    use SearchTrait;
    use DeleteTrait;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create raw from a data
     *
     * @param array $data
     * @throws RepositoryException
     */
    public function createRaw (array $data)
    {
        try {
            return $this->model->newInstance()->create($data);
        } catch (QueryException $e) {
            throw new RepositoryException($e->getMessage());
        }
    }

    public function updateRawById($id, array $data)
    {
        try {
            $updateable = $this->model->newInstance()->findOrFail($id);
            $updateable->fill($data);
            $updateable->save();
            return $updateable;
        }catch (ModelNotFoundException $e){
            throw new NotFoundException($e->getMessage());
        }catch (QueryException $e){
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Count all
     *
     * @param null $before
     * @return int
     */
    public function countAll($before = null)
    {
        $q = $this->model->newInstance()->getQuery();
        if (! empty($before)){
            $q = $q->where('created_at', '>',$before);
        }
        return $q->count();
    }

    /**
     * Count with query
     *
     * @param null $start
     * @param null $end
     * @param array $query
     * @return mixed
     */
    public function countWithQuery($start = null, $end = null, array $query = [])
    {
        $q = $this->addSimpleWheres($this->model->newInstance()->getQuery(), $query);
        $q = $this->addStartRange($q, $start);
        $q = $this->addEndRange($q, $end);
        return $q->count();
    }

    /**
     * Get all
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->newInstance()->all();
    }

    /**
     * Get paginated items
     *
     * @param int $perPage
     * @return mixed
     */
    public function getPaginated($perPage = 15)
    {
        return $this->getSearcheableQuery()->paginate($perPage);
    }

    /**
     * Find a user in DB based on ID
     *
     * @param $id
     * @throws NotFoundException
     * @return \Illuminate\Support\Collection|static
     */
    public function findById($id)
    {
        return $this->findBy('id', $id);
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Find a model by property
     *
     * @param $property
     * @param $value
     * @throws NotFoundException
     * @throws RepositoryException
     * @return static
     */
    public function findBy ($property, $value)
    {
        $model = $this->model->newInstance();
        try {
            $model = $model->where($property,'=',$value)->first();
        }catch (QueryException $e){
            throw new RepositoryException($e->getMessage());
        }
        if (is_null($model))
        {
            throw new NotFoundException("No model with {$property} = {$value} found");
        }
        return $model;
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Add start range for the one of the available date ex. created_at
     *
     * @param $q
     * @param $start
     * @param string $for
     * @return mixed
     */
    protected function addStartRange($q, $start, $for = 'created_at')
    {
        return $q = $start ? $q->where($for, '>=', $start) : $q;
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Add end range for the one of the available dates ex. created_at
     *
     * @param $q
     * @param $end
     * @param string $for
     * @return mixed
     */
    protected function addEndRange($q, $end, $for = 'created_at')
    {
        return $q = $end ? $q->where($for, '<', $end) : $q;
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Add simple wheres to the query
     *
     * @param $q
     * @param array $queries
     * @return mixed
     */
    protected function addSimpleWheres($q, array $queries)
    {
        foreach($queries as $key => $value){
            $q = $q->where($key, $value);
        }
        return $q;
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Get property from findBy magic method
     *
     * @param $method
     * @return mixed
     */
    private function getFindByProperty($method)
    {
        return strtolower(str_replace('findBy','',$method));
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Check that if a magic method argument is findable or not
     *
     * @param $method
     * @return bool
     */
    private function isFindable($method)
    {
        if (Str::startsWith($method, 'findBy'))
        {
            return true;
        }
        return false;
    }

    /**
     * @author bigsinoos <pcfeeler@gmail.com>
     * Add the ability to find by property
     *
     * @param $method
     * @param $args
     * @throws PardisanException
     * @return mixed
     */
    public function __call($method, $args)
    {
        if ($this->isFindable($method))
        {
            $property = $this->getFindByProperty($method);
            return call_user_func_array([$this, 'findBy'], [$property, $args[0]]);
        }
        throw new PardisanException("No method with name: [{$method}] found");
    }
}
