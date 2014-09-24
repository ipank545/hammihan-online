<?php namespace Pardisan\Commands\Article;

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class NewCommandHandler extends AbstractCommandHandler implements CommandHandler {

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

        $command->url_slug = null;
        $command->status_id = 1;
       // $command->user_id = Auth::user()->id;
        return $this->articleRepo->createRaw(get_object_vars($command));
    }
}