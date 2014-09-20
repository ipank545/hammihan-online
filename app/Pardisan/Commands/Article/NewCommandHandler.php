<?php namespace Pardisan\Commands\Article;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class ArticleCommandHandler extends AbstractCommandHandler implements CommandHandler {

    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepo;

    /**
     * @param ArticleRepositoryInterface $article
     */
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
        $command->url_slug = $command->id;
        return $this->articleRepo->createRaw(get_object_vars($command));
    }
}