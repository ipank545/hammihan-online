<?php namespace Pardisan\Commands\Role; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractBulkDeleteCommandHandler;
use Pardisan\Repositories\RoleRepositoryInterface;

class BulkDeleteCommandHandler extends AbstractBulkDeleteCommandHandler implements CommandHandler
{
    protected $roleRepo;

    public function __construct(
        RoleRepositoryInterface $roleRepo
    ){
        $this->roleRepo = $roleRepo;
    }

    protected function getRepo()
    {
        return $this->roleRepo;
    }
}
