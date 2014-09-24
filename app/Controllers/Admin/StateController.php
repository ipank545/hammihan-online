<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Translation\Translator;
use Illuminate\View\View;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\StateRepositoryInterface;

class StateController extends BaseController
{
    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;

    /**
     * @param Translator $lang
     * @param Request $request
     * @param StateRepositoryInterface $stateRepo
     */
    public function __construct(
        Translator $lang,
        Request $request,
        StateRepositoryInterface $stateRepo
    ){
        $this->lang = $lang;
        $this->request = $request;
        $this->stateRepo = $stateRepo;
    }

    /**
     * View page for article states index
     *
     * @return View
     */
    public function index()
    {
        $states= $this->stateRepo->getAll();

        return $this->view(
            'admin.pages.state.index',
            compact('states')
        );
    }

    /**
     * Creating for for article states
     *
     * @return View
     */
    public function create()
    {
        return $this->view('salgado.pages.state.create_edit');
    }

    /**
     * Storing an state into db
     *
     * @return Redirect
     */
    public function store()
    {
        try {

            $created = $this->execute('Pardisan\Commands\State\NewArticleStateCommand');

            return $this->redirectRoute('admin.pages.article_states.index')->with(
                'success_message',
                $this->lang->get('messages.article_status.store_success', ['machine_name' => $created->machine_name])
            );

        }catch (FormValidationException $e){

            return $this->redirectBack()->withInput()->withErrors($e->getErrors());

        }
    }

    /**
     * Edit form
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        try {

            $state = $this->stateRepo->findById($id);

            return $this->view(
                'salgado.pages.state.create_edit',
                compact('state')
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }
    }

    /**
     * Updating an state in db
     *
     * @param $id
     * @return Redirect
     */
    public function update($id)
    {
        $this->request->merge(['id' => $id]);
        try {

            $updated = $this->execute('Pardisan\Commands\State\UpdateArticleStateCommand');

            return $this->redirectBack()->with(
                'success_message',
                $this->lang->get(
                    'messages.articles_statuses.success_update',
                    ['machine_name' => $updated->machine_nmae]
                )
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }catch(FormValidationException $e){

            return $this->redirectBack()->withInput()->withErrors($e->getErrors());

        }
    }

    /**
     * Bulking update state priorities
     *
     * @return Redirect
     */
    public function bulkUpdate()
    {

    }

} 
