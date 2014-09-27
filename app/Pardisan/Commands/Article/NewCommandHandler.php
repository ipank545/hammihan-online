<?php namespace Pardisan\Commands\Article;

use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\CommandHandler;
use Miladr\Jalali\jDateTime;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Exceptions\AccessException;
use Pardisan\Models\Article;
use Pardisan\Repositories\ArticleRepositoryInterface;
use Pardisan\Repositories\CategoryRepositoryInterface;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\StateRepositoryInterface;
use Pardisan\Support\AccessControl\Contracts\BridgeInterface;

/**
 * @property mixed publish_date
 */
class NewCommandHandler extends AbstractCommandHandler implements CommandHandler {

    use CommanderTrait;

    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepo;

    /**
     * @var RepositoryWrapperInterface
     */
    protected $repoWrapper;

    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;

    /**
     * @var BridgeInterface
     */
    protected $control;

    /**
     * created article
     * @var Article
     */
    protected $created;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $catRepo;

    /**
     * @param ArticleRepositoryInterface $article
     * @param RepositoryWrapperInterface $repoWrapper
     * @param StateRepositoryInterface $stateRepo
     * @param CategoryRepositoryInterface $catRepo
     * @param BridgeInterface $control
     */
    public function __construct(
        ArticleRepositoryInterface $article,
        RepositoryWrapperInterface $repoWrapper,
        StateRepositoryInterface $stateRepo,
        CategoryRepositoryInterface $catRepo,
        BridgeInterface $control
    ){

        $this->articleRepo = $article;
        $this->repoWrapper = $repoWrapper;
        $this->stateRepo = $stateRepo;
        $this->control = $control;
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
        return $this->doCreate();
    }

    /**
     * Create article with all dependencies
     *
     * @return Article
     * @throws \Exception
     */
    protected function doCreate()
    {
        try {
            $this->repoWrapper->begin();
            $this->checkArticleState();
            $this->checkArticleCategory();
            $this->created = $this->doArticleCreate();
            $this->addState();
            $this->addTags();
        } catch (\Exception $e) {
            $this->repoWrapper->failure();
            throw $e;
        }
        $this->repoWrapper->end();
        return $this->created;
    }

    /**
     * Check that user has access to the state that he is requesting for
     *
     * @throws AccessException
     */
    protected function checkArticleState()
    {
        if (! $this->control->userHasAccessToState($this->command->state_id)){
            $error = new AccessException();
            $error->setLnagKey("messages.states.access_denied");
            throw $error;
        }
    }

    /**
     * Create the base article without relationships
     *
     * @return Article
     */
    protected function doArticleCreate()
    {
        return $this->articleRepo->createRaw($this->getArticleCreateData());
    }

    /**
     * Check that user has access to the category he is requesting for
     *
     * @throws AccessException
     */
    protected function checkArticleCategory()
    {
        if (! $this->control->userHasAccessToCategory($this->command->category_id)){
            $error = new AccessException();
            $error->setLangKey("messages.categories.access_denied");
            throw $error;
        }
    }

    /**
     * Decorate article repository creation data
     *
     * @return array
     */
    protected function getArticleCreateData()
    {
        return [
            'first_title'       =>  $this->command->first_title,
            'important_title'   =>  $this->command->important_title,
            'second_title'      =>  $this->command->second_title,
            'commentable'       =>  (boolean) $this->command->commentable,
            'user_id'           =>  $this->command->user_id,
            'body'              =>  $this->command->body,
            'summary'           =>  $this->command->summary,
            'publish_date'      =>  $this->convertDate($this->command->publish_date),
            'thumb_image'       =>  $this->command->thumb_image,
            'large_image'       =>  $this->command->large_image,
            'category_id'       =>  $this->command->category_id
        ];
    }

    /**
     * Convert persian entered date to gregorian
     *
     * @param $publish_date
     * @return null|string
     */
    protected function convertDate($publish_date)
    {
        if (empty($publish_date)) return null;
        list($date, $time) = explode(' ', $publish_date);
        list($year, $month, $day) = explode('-', $date);
        return implode('-', jDateTime::toGregorian($year, $month, $day)) . ' ' . $time . ":00";
    }

    /**
     * Add requested state to article
     *
     * @return void
     */
    protected function addState()
    {
        $this->created = $this->stateRepo->addStateToArticle($this->created, $this->command->state_id, true,$this->command->user_id);
    }

    protected function addTags()
    {
        $this->created = $this->execute(
            'Pardisan\Commands\Tag\StrListCommand',
            ['article' => $this->created, 'tagListStr' => $this->command->tags]
        );
    }

}
