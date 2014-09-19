<?php namespace Pardisan\Repositories\Eloquent; 

use Closure;
use Illuminate\Database\DatabaseManager;
use Pardisan\Repositories\RepositoryWrapperInterface;

class RepositoryWrapper implements RepositoryWrapperInterface
{
    /**
     * @var DatabaseManager
     */
    protected $db;

    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * Begin dependant repository job
     *
     * @return void
     */
    public function begin()
    {
        $this->db->beginTransaction();
    }

    /**
     * End dependant repository job
     *
     * @return void
     */
    public function end()
    {
        $this->db->commit();
    }

    /**
     * Action on repository failure job
     *
     * @return void
     */
    public function failure()
    {
        $this->db->rollback();
    }

    /**
     * Wrap inside a closure
     *
     * @param callable $job
     */
    public function wrap(closure $job)
    {
        $this->db->transaction($job);
    }
}
