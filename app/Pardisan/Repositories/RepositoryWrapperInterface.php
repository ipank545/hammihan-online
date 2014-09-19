<?php namespace Pardisan\Repositories;

use Closure;

interface RepositoryWrapperInterface {
    /**
     * Begin dependant repository job
     *
     * @return void
     */
    public function begin();

    /**
     * End dependant repository job
     *
     * @return void
     */
    public function end();

    /**
     * Action on repository failure job
     *
     * @return void
     */
    public function failure();

    /**
     * Wrap inside a closure
     *
     * @param callable|closure $job
     * @return void
     */
    public function wrap(closure $job);
} 
