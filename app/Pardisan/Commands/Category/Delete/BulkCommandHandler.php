<?php namespace Pardisan\Commands\Category\Delete; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractBulkDeleteCommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Commands\Category\Exceptions\DeleteDeniedException;
use Pardisan\Models\Article;
use Pardisan\Repositories\CategoryRepositoryInterface;

class BulkCommandHandler extends AbstractCommandHandler implements CommandHandler
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
        $deletables = (array) $command->deleteables;
        $denieds = Article::$homePageCats;
        $deniedCats = $this->catRepo->loadCatsByName($denieds)->lists('id');
        foreach($deniedCats as $catId){
            if (in_array($catId, $deletables)){
                $err = new DeleteDeniedException("Delete denied for id : [{$catId}]");
                $err->setLangKey("messages.delete_denied");
                throw $err;
            }
        }
        return $this->catRepo->bulkDelete($deletables);
    }
}
