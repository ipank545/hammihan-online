<?php namespace Pardisan\Commands\Category\Store; 

use Pardisan\Commands\AbstractCommandHandler;
use Laracasts\Commander\CommandHandler as CommandHandlerInterface;
use Pardisan\Repositories\CategoryRepositoryInterface;

class CommandHandler extends AbstractCommandHandler implements CommandHandlerInterface
{
    protected $catRepo;

    public function __construct(
        CategoryRepositoryInterface $catRepo
    ){
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
        $data = get_object_vars($command);
        return $this->catRepo->createRaw($data);
    }
}
