<?php namespace Pardisan\Repositories\Eloquent\HelperTraits; 

trait SearchTrait {
    /**
     * Query conditions
     *
     * @var array
     */
    protected $conditions;

    /**
     * Set conditions on the repo
     *
     * @param array $conditions
     * @return $this
     */
    public function setConditions(array $conditions = [])
    {
        $this->conditions = $conditions; return $this;
    }

    /**
     * Add conditions to query
     *
     * @param null $query
     * @param array $conditions
     * @return mixed
     */
    protected function getSearcheableQuery($query = null, array $conditions = [])
    {
        $conditions = ! empty($conditions) ? $conditions  : $this->getConditions();
        $query = is_null($query) ? $this->model->newInstance() : $query;
        foreach((array) $conditions as $condition => $value)
        {
            $query = $query->where($condition, $value);
        }
        return $query;
    }

    /**
     * Get current conditions
     *
     * @return array
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Make conditions empty
     *
     * @return $this
     */
    public function emptyConditions()
    {
        $this->conditions = null; return $this;
    }
} 
