<?php namespace Pardisan\Commands\State; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\RepositoryException;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\RoleRepositoryInterface;
use Pardisan\Repositories\StateRepositoryInterface;

class RoleStateCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $roleRepo;
    protected $repoWrapper;
    protected $stateRepo;

    public function __construct(
        RoleRepositoryInterface $roleRepo,
        RepositoryWrapperInterface $repoWrapper,
        StateRepositoryInterface $stateRepo
    ){
        $this->roleRepo = $roleRepo;
        $this->repoWrapper = $repoWrapper;
        $this->stateRepo = $stateRepo;
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
            $allStates = $this->stateRepo->getAll()->lists('id');

            foreach($allRoles as $role)
            {
                $insertables = [];
                if (! empty($roleIds[ $role->id ]['states'])){
                    foreach($roleIds[$role->id]['states'] as $stateId){
                        if (in_array($stateId, $allStates)){
                            $insertables [] = $stateId;
                        }
                    }
                }
                $this->stateRepo->addStatesToRole($role, $insertables);
            }
        }catch (RepositoryException $e){
            $this->repoWrapper->failure();
            throw $e;
        }

        $this->repoWrapper->end();
    }
}
