<?php namespace Pardisan\Commands\Permission; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\RepositoryException;
use Pardisan\Repositories\PermissionRepositoryInterface;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\RoleRepositoryInterface;

class PermRoleCommandHandler extends AbstractCommandHandler implements CommandHandler
{

    protected $permRepo;
    protected $roleRepo;
    protected $repoWrapper;

    public function __construct(
        RoleRepositoryInterface $roleRepo,
        PermissionRepositoryInterface $permRepo,
        RepositoryWrapperInterface $repoWrapper
    ){
        $this->roleRepo = $roleRepo;
        $this->permRepo = $permRepo;
        $this->repoWrapper = $repoWrapper;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @throws RepositoryException
     * @throws \Exception
     * @return mixed
     */
    public function handle($command)
    {
        $this->repoWrapper->begin();

        $roleIds = (array) $command->roles;

        try {
            $allRoles = $this->roleRepo->getAll();
            $allPermissions = $this->permRepo->getAll()->lists('id');

            foreach($allRoles as $role)
            {
                $insertables = [];
                if (! empty($roleIds[ $role->id ]['permissions'])){
                    foreach($roleIds[$role->id]['permissions'] as $permissionId){
                        if (in_array($permissionId, $allPermissions)){
                            $insertables [] = $permissionId;
                        }
                    }
                }
                $this->permRepo->addPermissionsToRole($role, $insertables);
            }
        }catch (RepositoryException $e){
            $this->repoWrapper->failure();
            throw $e;
        }

        $this->repoWrapper->end();
    }
}
