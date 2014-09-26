<?php namespace Pardisan\Commands\State; 

use Pardisan\Commands\AbstractBulkDeleteCommandHandler;
use Pardisan\Repositories\StateRepositoryInterface;

class BulkDeleteCommandHandler extends AbstractBulkDeleteCommandHandler
{
    protected $stateRepo;

    public function __construct(
        StateRepositoryInterface $stateRepo
    ){
        $this->stateRepo = $stateRepo;
    }

    protected function getRepo()
    {
        return $this->stateRepo;
    }
} 
