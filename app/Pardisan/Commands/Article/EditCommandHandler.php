<?php namespace Pardisan\Commands\Article;

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;

class EditCommandHandler extends AbstractCommandHandler implements CommandHandler {

    protected $articleRepo;
    protected $id;

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
        $this->setCommand($command);
        $this->id = $this->getId();
        return $this->articleRepo->editById($this->id, $this->getUpdateData());
    }


    protected function getId()
    {
        return $this->articleRepo->findById($this->id);
    }


    protected function getUpdateData()
    {
        return [
            'first_title'          =>  $this->command->first_title,
            'second_title'         =>  $this->command->second_title,
            'important_title'      =>  $this->command->important_title,
            'summary'              =>  $this->command->summary,
            'body'                 =>  $this->command->body,
            'publish_date'         =>  $this->command->publish_date,
            'status_id'            =>  $this->command->status_id,
            'author'               =>  $this->command->author,
            'category'             =>  $this->command->category
        ];
    }


}