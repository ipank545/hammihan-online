<?php namespace Pardisan\Commands\User; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\RoleRepositoryInterface;
use Pardisan\Repositories\UserRepositoryInterface;

class UpdateCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    use HandlerHelperTrait;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;

    /**
     * @var RoleRepositoryInterface
     */
    protected $roleRepo;

    /**
     * @var RepositoryWrapperInterface
     */
    protected $repoWrapper;

    public function __construct(
        UserRepositoryInterface $userRepo,
        RoleRepositoryInterface $roleRepo,
        RepositoryWrapperInterface $repoWrapper
    ){
        $this->userRepo = $userRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->setCommand($command);
        return $this->doUpdate();
    }

    /**
     * Do Update
     *
     * @throws \Exception
     * @return User
     */
    protected function doUpdate()
    {
        // As we don't want to do incomplete jobs here
        // we wrap the repository code so we can trace it for rollbacking
        // In this case RepoWrapperInterface has been bound to a class
        // that uses database transactions fo this feature.
        $userData = $this->getUserData(); // get data that fits user repository for update
        $userId = $userData['id'];
        unset($userData['id']); // unset user id because it is not in mass assignment of the model
        try {
            $this->repoWrapper->begin();
            $updated = $this->userRepo->updateById($userId, $userData);
            $updated = $this->addCommandRolesToUser($updated);
        }catch (\Exception $e){
            $this->repoWrapper->failure();
            throw $e;
        }
        $this->repoWrapper->end();
        return $updated;
    }
}
