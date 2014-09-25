<?php namespace Pardisan\Commands\Article;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class DeleteCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $articleRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo
    ){
        $this->articleRepo = $articleRepo;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->articleRepo->bulkDelete($command->deleteables);
    }
}
