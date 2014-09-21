<?php namespace Pardisan\Commands\Role;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Models\Role;
use Pardisan\Repositories\RoleRepositoryInterface;

class UpdateCommandHandler extends AbstractCommandHandler implements CommandHandler {

    /**
     * @var RoleRepositoryInterface
     */
    protected $roleRepo;

    /**
     * @param RoleRepositoryInterface $roleRepo
     */
    public function __construct(
        RoleRepositoryInterface $roleRepo
    ){
        $this->roleRepo = $roleRepo;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return Role
     */
    public function handle($command)
    {
        return $this->roleRepo->updateById($command->id, (array) $command);
    }
}