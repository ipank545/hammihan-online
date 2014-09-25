<?php namespace Pardisan\Commands\Category\Update; 

use Laracasts\Commander\CommandHandler as CommandHandlerInterface;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\CategoryRepositoryInterface;

class CommandHandler extends AbstractCommandHandler implements CommandHandlerInterface
{
    protected $catRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo
    ){
        $this->catRepo = $cateRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $id = $command->id;
        return $this->catRepo->updateRawById($id, ['name' => $command->name, 'slug' => $command->slug]);
    }
}
