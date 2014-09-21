<?php namespace Pardisan\Commands\Article;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class EditCommandHandler extends AbstractCommandHandler implements CommandHandler {

    protected $articleRepo;

    public function __construct(ArticleRepositoryInterface $article){

        $this->articleRepo = $article;
     }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->articleRepo->edit($command->id);
    }
}