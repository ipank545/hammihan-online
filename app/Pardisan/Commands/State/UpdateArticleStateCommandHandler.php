<?php namespace Pardisan\Commands\State; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\StateRepositoryInterface;

class UpdateArticleStateCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;

    /**
     * @param StateRepositoryInterface $stateRepo
     */
    public function __construct(
        StateRepositoryInterface $stateRepo
    ){
        $this->stateRepo = $stateRepo;
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

    public function doUpdate()
    {
        $commandData = $this->getCommand();
        $updateable = $this->stateRepo->findById($commandData->id);
        return $this->stateRepo->update($updateable, $this->getUpdateData());
    }

    protected function getUpdateData()
    {
        $commandData = get_object_vars($this->getCommand());
        unset($commandData['id']);
        return $commandData;
    }
}
