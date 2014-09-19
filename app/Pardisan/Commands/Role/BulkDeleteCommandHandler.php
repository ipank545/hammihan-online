<?php namespace Pardisan\Commands\Role; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\RoleRepositoryInterface;

class BulkDeleteCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $roleRepo;

    public function __construct(
        RoleRepositoryInterface $roleRepo
    ){
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
        return dd($this->roleRepo->bulkDelete($command->deleteables));
    }
}
