<?php namespace Controllers\Admin\Api\V1;

use Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\StateRepositoryInterface;

class StateController extends BaseController
{
    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @var StateRepositoryInterface
     */
    protected $stateRepo;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Request $request
     * @param StateRepositoryInterface $stateRepo
     * @param Translator $lang
     */
    public function __construct(
        Request $request,
        StateRepositoryInterface $stateRepo,
        Translator $lang
    ){
        $this->request = $request;
        $this->stateRepo = $stateRepo;
        $this->lang = $lang;
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

            return $this->responseJson($created, 200);

        }catch (FormValidationException $e){

            return $this->responseJson(['errors' => $e->getErrors()], 422);

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

            return $this->responseJson($updated, 200);

        }catch (NotFoundException $e){

            App::abort(404);

        }catch(FormValidationException $e){

            return $this->redirectBack()->withInput()->withErrors($e->getErrors());

        }
    }
} 
