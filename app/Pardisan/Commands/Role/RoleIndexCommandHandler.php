<?php namespace Pardisan\Commands\Role; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Repositories\RoleRepositoryInterface;

class RoleIndexCommandHandler implements CommandHandler
{

    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->roleRepo->getAll();
    }
}
