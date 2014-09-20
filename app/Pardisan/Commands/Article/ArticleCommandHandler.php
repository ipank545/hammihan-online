<?php namespace Pardisan\Commands\Article;


use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class ArticleCommandHandler implements CommandHandler {

    protected $article;

    public function __construct(ArticleRepositoryInterface $article){

        $this->article = $article;
    }
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->article->create(get_object_vars($command));
    }
}