<?php namespace Pardisan\Commands\User; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\UserRepositoryInterface;

class IndexCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;

    /**
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(
        UserRepositoryInterface $userRepo
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
        return $this->getUsers();
    }

    /**
     * Get users from repository
     *
     * @return mixed
     */
    protected function getUsers()
    {
        return $this->userRepo->getPaginated(50);
    }

    /**
     * Get search conditions
     *
     * @param array $except
     * @return array
     */
    protected function getSearchConditions(array $except = [])
    {
        $conds = get_object_vars($this->getCommand());
        foreach($except as $ignoreable)
        {
            unset($conds[$ignoreable]);
        }
        return $conds;
    }
}
