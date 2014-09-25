<?php namespace Pardisan\Commands\User; 

use Pardisan\Commands\AbstractBulkDeleteCommandHandler;
use Pardisan\Repositories\UserRepositoryInterface;

class BulkDeleteCommandHandler extends AbstractBulkDeleteCommandHandler
{
    protected $userRepo;

    public function __construct(
        UserRepositoryInterface $userRepo
    ){
        $this->userRepo = $userRepo;
    }

    protected function getRepo()
    {
        return $this->userRepo;
    }
} 
