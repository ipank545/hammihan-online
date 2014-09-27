<?php namespace Controllers\Admin;

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Translation\Translator;
use Intervention\Image\Exception\NotFoundException;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\ArticleRepositoryInterface;
use Pardisan\Repositories\CategoryRepositoryInterface;
use Pardisan\Repositories\Eloquent\ArticleRepository;
use Pardisan\Repositories\StateRepositoryInterface;
use Pardisan\Support\AccessControl\Contracts\BridgeInterface;
use Symfony\Component\CssSelector\Exception\ExpressionErrorException;

class ArticleController extends BaseController
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var AuthManager
     */
    protected $auth;

    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;


    protected $artcl;

    protected $control;

    /**
     * @param Request $request
     * @param AuthManager $auth
     * @param Translator $lang
     * @param ArticleRepositoryInterface $artcl
     * @param CategoryRepositoryInterface $cateRepo
     * @param StateRepositoryInterface $stateRepo
     * @param BridgeInterface $control
     */
    public function __construct(
        Request $request,
        AuthManager $auth,
        Translator $lang,
        ArticleRepositoryInterface $artcl,
        CategoryRepositoryInterface $cateRepo,
        StateRepositoryInterface $stateRepo,
        BridgeInterface $control
    )
    {
        $this->request = $request;
        $this->auth = $auth;
        $this->lang = $lang;
        $this->artcl = $artcl;
        $this->catRepo = $cateRepo;
        $this->stateRepo = $stateRepo;
        $this->control = $control;
    }

    /**
     * Storing an article in repository
     *
     * @return Redirect
     */
    public function store()
    {
        $input = $this->request->only(
            'first_title',
            'second_title',
            'important_title',
            'summary',
            'body',
            'publish_date',
            'state_id',
            'author',
            'category_id',
            'commentable',
            'thumb_image',
            'large_image',
            'tags'
        );

        $input['user_id'] = Auth::user()->id;

        try {

            $newArticle = $this->execute('Pardisan\Commands\Article\NewCommand', $input);

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get('messages.articles.success_store', ['article_id' => $newArticle->id])
            );


        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors())->withInput();

        }

    }

    public function update($id)
    {
        $update_input = $this->request->only(
            'first_title',
            'second_title',
            'important_title',
            'summary',
            'body',
            'publish_date',
            'status_id',
            'author'
        );

        $update_input['user_id'] = $this->auth->user()->id;

        try {

            $update_article = $this->execute('Pardisan\Commands\Article\EditCommand', ['id' => $id, 'update_input' => $update_input]);

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get('messages.articles.success_update', ['article_id' => $update_article->id])
            );
        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors())->withInput();
        }
    }

    public function delete($id)
    {

        $id = (array)$id;
        try {

            $deleted = $this->execute(
                'Pardisan\Commands\Article\DeleteCommand',
                ['deleteables' => $id]
            );

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get('حذف با موفقیت انجام شد')
            );

        } catch (NotFoundException $e) {

            App::abort(404);

        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());

        } catch (RepositoryException $e) {

            return $this->redirectBack()->with(
                'error_message',
                $this->lang->get(
                    'messages.roles.single_delete_relation_error',
                    ['article_id' => $id[0]]
                )
            );

        }

    }


    public function showAll()
    {

        try {

            $articles = $this->artcl->getAll();

            return $this->view('salgado.pages.article.index')->with(
                'articles', $articles
            );
        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());
        }
    }

    /**
     * Delete a role from repo
     *
     * @return Redirect
     */
    public function bulkDelete()
    {
        $deletables = $this->request->input('selectable', []);

        try {

            $count = $this->execute(
                'Pardisan\Commands\Article\DeleteCommand',
                ['deleteables' => $deletables]
            );

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get(
                    'آیتم (ها)با موفقیت حذف شدند',
                    ['count' => $count]
                )
            );

        } catch (NotFoundException $e) {

            App::abort(404);

        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());

        } catch (RepositoryException $e) {

            return $this->redirectBack()->with(
                'error_message',
                $this->lang->get('messages.articles.bulk_delete_relation_error')
            );

        }
    }

    /**
     * Create a new article form
     *
     * @return View
     */
    public function create()
    {
        $user = $this->auth->user();
        if ($this->control->canByPass()){
            $categories = $this->catRepo->getAll();
            $states = $this->stateRepo->getAll();
        }else {
            $categories = $this->catRepo->loadUserAvailableCats($user);
            $states =  $this->stateRepo->loadUserAvailableStates($user);
        }
        return $this->view(
            'salgado.pages.article.create_update',
            compact('categories', 'states')
        );
    }

    public function edit($id)
    {
        $user = $this->auth->user();
        try {
            $article = $this->artcl->findById($id);
            if ($this->control->canByPass()){
                $categories = $this->catRepo->getAll();
                $states = $this->stateRepo->getAll();
            }else {
                $categories = $this->catRepo->loadUserAvailableCats($user);
                $states =  $this->stateRepo->loadUserAvailableStates($user);
            }
        }catch(NotFoundException $e){

        }
    }
} 
