<?php namespace Pardisan\Repositories\Eloquent;

use Pardisan\Models\Log;
use Pardisan\Repositories\LogRepositoryInterface;

class LogRepository extends AbstractRepository implements LogRepositoryInterface{

    public $model;

    public function __construct(Log $log)
    {
        $this->model = $log;
    }
}