<?php namespace Pardisan\Commands\Article; 

use Illuminate\Support\Facades\Log;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Models\Article;
use Pardisan\Repositories\ArticleRepositoryInterface;
use Pardisan\Repositories\CategoryRepositoryInterface;

class HomePageCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $articleRepo;
    protected $catRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo,
        CategoryRepositoryInterface $catRepo
    ){
        $this->articleRepo = $articleRepo;
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
        $this->setCommand($command);
        $catNames = array_values(Article::$homePageCats);
        $flippedCats = array_flip(Article::$homePageCats);
        $cats = $this->catRepo->loadCatsByName($catNames);
        $data = [];
        foreach($cats as $cat){
            $type = $flippedCats[$cat->name];
            $count = $type == 'news' ? 10 : 1;
            if (isset($flippedCats[$cat->name])){
                $cat->article = $this->articleRepo->guestArticlesForCat($cat, $count);
                $data [$flippedCats[$cat->name]] = $cat;
            }
        }
        $data['carousel_slides'] = $this->articleRepo->loadArticlesWithLargeImage(3);
        $data['highlighted'] = $this->articleRepo->randomHighlighted();
        return $data;
    }
}
