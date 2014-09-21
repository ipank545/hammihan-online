<?php namespace Pardisan\Commands\Permission;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\PermissionRepositoryInterface;

class InfoCommandHandler extends AbstractCommandHandler implements CommandHandler {

    protected $permRepo;

    public function __construct(
        PermissionRepositoryInterface $permRepo
    ){
        $this->permRepo = $permRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->permRepo->getPermissionsWithRoles();
    }
}