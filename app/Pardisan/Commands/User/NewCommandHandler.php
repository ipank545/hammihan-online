<?php namespace Pardisan\Commands\User; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\CategoryRepositoryInterface;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\RoleRepositoryInterface;
use Pardisan\Repositories\UserRepositoryInterface;

class NewCommandHandler extends AbstractCommandHandler implements CommandHandler {

    use HandlerHelperTrait;

    /**
     * @var RepositoryWrapperInterface
     */
    protected $repoWrapper;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $catRepo;

    /**
     * @var RoleRepositoryInterface
     */
    protected $roleRepo;

    /**
     * @param RepositoryWrapperInterface $repoWrapper
     * @param UserRepositoryInterface $userRepo
     * @param RoleRepositoryInterface $roleRepo
     * @param CategoryRepositoryInterface $catRepo
     */
    public function __construct(
        RepositoryWrapperInterface $repoWrapper,
        UserRepositoryInterface $userRepo,
        RoleRepositoryInterface $roleRepo,
        CategoryRepositoryInterface $catRepo
    ){
        $this->repoWrapper = $repoWrapper;
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
        $this->catRepo = $catRepo;
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
        return $this->doCreate();
    }

    /**
     * Process the flow of creating a new user
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed
     * @throws \Exception
     */
    protected function doCreate()
    {
        try {
            $this->repoWrapper->begin();

            $createdUser = $this->userRepo->createRaw($this->getUserData());
            $createdUser = $this->addCommandRolesToUser($createdUser);
            $createdUser = $this->addCommandCategoriesToUser($createdUser);

        }catch (\Exception $e){

            $this->repoWrapper->failure();
            throw $e;
        }
        $this->repoWrapper->end();
        return $createdUser;
    }
}
