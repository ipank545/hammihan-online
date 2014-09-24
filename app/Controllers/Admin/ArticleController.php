<?php namespace Controllers\Admin;

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Translation\Translator;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\ArticleRepositoryInterface;
use Pardisan\Repositories\Eloquent\ArticleRepository;
use Symfony\Component\CssSelector\Exception\ExpressionErrorException;

class ArticleController extends BaseController {

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


    protected $artcl;
    /**
     * @param Request $request
     * @param AuthManager $auth
     * @param Translator $lang
     */
    public function __construct(
        Request $request,
        AuthManager $auth,
        Translator $lang,
        ArticleRepositoryInterface $artcl
    ){
        $this->request = $request;
        $this->auth = $auth;
        $this->lang = $lang;
        $this->artcl = $artcl;
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
            'status_id',
            'author'
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

    public function edit($id)
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

        try {

            $this->execute('Pardisan\Commands\Article\DeleteCommand', ['id' => $id]);

            return $this->redirectRoute('admin.articles.index')->with(
                'success_message',
                $this->lang->get('حذف با موفقیت انجام شد')   //I'm not sure about message
            );
        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());
        }
    }

    public function showAll()
    {

        try {

            $articles = $this->artcl->getAll();

        return $this->view('salgado.pages.article.index')->with(
                'articles',$articles
            );
        } catch (FormValidationException $e) {

            return $this->redirectBack()->withErrors($e->getErrors());
        }
    }
} 