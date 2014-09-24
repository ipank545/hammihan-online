<?php namespace Pardisan\Commands\State; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Models\State;
use Pardisan\Repositories\StateRepositoryInterface;

class NewArticleStateCommandHandler extends AbstractCommandHandler implements CommandHandler
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
     * Create a new article state
     *
     * @param $command
     * @return State
     */
    public function handle($command)
    {
        $this->setCommand($command);
        return $this->stateRepo->createRaw($this->getCommandData());
    }

    /**
     * Get set command data
     *
     * @return array
     */
    protected function getCommandData()
    {
        return get_object_vars($this->getCommand());
    }
} 
