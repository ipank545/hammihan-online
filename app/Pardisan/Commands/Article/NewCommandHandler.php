<?php namespace Pardisan\Commands\Article;

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;
use Miladr\Jalali\jDate;
use Miladr\Jalali\jDateTime;

/**
 * @property mixed publish_date
 */
class NewCommandHandler extends AbstractCommandHandler implements CommandHandler {

    /**
     * @var ArticleRepositoryInterface
     */
    public  $articleRepo;

    public  $date;
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
  $command->status_id = null;

   // return $command;

   $cr= [
   'first_title'          =>       $command->first_title,
   'second_title'         =>       $command->second_title,
   'important_title'      =>       $command->important_title,
   'summary'              =>       $command->summary,
   'body'                 =>       $command->body,
   'publish_date'         =>       $command->publish_date,
   'status_id'            =>       $command->status_id,
   'author'               =>       $command->author,
   'user_id'              =>       $command->user_id,
   'category'             =>       $command->category,
  ];
        $cr['user_id'] = Auth::user()->id;

    return $this->articleRepo->createRaw(($cr));
    }

    /**
     * @param $pdate
     * @return string
     */




}