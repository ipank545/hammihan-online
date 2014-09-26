<?php namespace Pardisan\Commands\Article;

use Illuminate\Support\Facades\Auth;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Exceptions\AccessException;
use Pardisan\Repositories\ArticleRepositoryInterface;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\StateRepositoryInterface;
use Pardisan\Support\AccessControl\Contracts\BridgeInterface;

/**
 * @property mixed publish_date
 */
class NewCommandHandler extends AbstractCommandHandler implements CommandHandler {

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
     * @var BridgeRepositoryInterface
     */
    protected $control;

    /**
     * @param ArticleRepositoryInterface $article
     * @param RepositoryWrapperInterface $repoWrapper
     * @param StateRepositoryInterface $stateRepo
     * @param BridgeInterface $control
     */
    public function __construct(
        ArticleRepositoryInterface $article,
        RepositoryWrapperInterface $repoWrapper,
        StateRepositoryInterface $stateRepo,
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

    protected function doCreate()
    {
        try {
            $this->repoWrapper->begin();
            $this->handleArticleState();
        } catch (\Exception $e) {
            $this->repoWrapper->failure();
            throw $e;
        }
        return ;
    }

    protected function handleArticleState()
    {
        if (! $this->control->userHasAccessToState($this->command->state_id)){
            $error = new AccessException();
            $error->setLnagKey("messages.states.access_denied");
            throw $error;
        }
    }

    protected function handleArticleCategory()
    {
        if (! $this->control->userHasAccessToCategory($this->command->category_id)){
            $error = new AccessException();
            $error->setLangKey("messages.categories.access_denied");
            throw $error;
        }
    }

}
