<?php namespace Pardisan\Repositories\Exceptions; 

use Illuminate\Database\QueryException;

class RepositoryRelationException extends RepositoryException
{
    /**
     * @var QueryException
     */
    protected $driverException;

    /**
     * Set driver exception
     *
     * @param QueryException $e
     */
    public function setDriverException(QueryException $e)
    {
        $this->driverException = $e;
    }

    /**
     * Get used driver error
     *
     * @return string
     */
    public function getDriverErrorMessage()
    {
        return $this->driverException->getMessage();
    }
} 
