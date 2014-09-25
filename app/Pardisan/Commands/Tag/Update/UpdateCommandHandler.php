<?php namespace Pardisan\Commands\Tag\Update; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\TagRepositoryInterface;

class UpdateCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $tagRepo;

    public function __construct(
        TagRepositoryInterface $tagRepo
    ){
        $this->tagRepo = $tagRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->tagRepo->updateRawById($command->$id, get_object_vars($command));
    }
}
