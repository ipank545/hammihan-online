<?php namespace Pardisan\Commands\Role;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\RoleRepositoryInterface;

class NewCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    /**
     * @var
     */
    protected $roleRepo;

    /**
     * @param RoleRepositoryInterface $roleRepo
     */
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
        return $this->roleRepo->createRaw(get_object_vars($command));
    }
}