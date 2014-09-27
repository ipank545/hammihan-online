<?php namespace Pardisan\Commands\Tag; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\ArticleRepositoryInterface;
use Pardisan\Repositories\TagRepositoryInterface;

class StrListCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $tagRepo;
    protected $articleRepo;

    public function __construct(
        TagRepositoryInterface $tagRepo,
        ArticleRepositoryInterface $articleRepo
    ){
        $this->tagRepo = $tagRepo;
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
        $tagList = $command->tagListStr;
        if (empty($tagList)) return $command->article;
        $exploded = mb_split('،', $tagList);
        $tags = [];
        foreach((array) $exploded as $tag){
            $tags [] = $this->tagRepo->findByTagNameOrCreate(['name' => $tag])->id;
        }
        return $this->tagRepo->addTagsToArticle($command->article, $tags);
    }
}
