<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Translation\Translator;
use Laracasts\Validation\FormValidationException;
use Pardisan\Commands\Category\Exceptions\DeleteDeniedException;
use Pardisan\Repositories\CategoryRepositoryInterface;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\Exceptions\RepositoryException;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $catRepo;

    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @param CategoryRepositoryInterface $catRepo
     * @param Translator $lang
     */
    public function __construct(
        CategoryRepositoryInterface $catRepo,
        Translator $lang
    ){
        $this->catRepo = $catRepo;
        $this->lang = $lang;
    }

    /**
     * Listing all cats
     *
     * @return View
     */
    public function index()
    {
        $categories = $this->catRepo->getPaginated(50);
        return $this->view(
            'salgado.pages.category.index',
            compact('categories')
        );
    }

    /**
     * Category creation form
     *
     * @return View
     */
    public function create()
    {
        return $this->view('salgado.pages.category.create_edit');
    }

    /**
     * Editing a category
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        try {

            $category = $this->catRepo->findById($id);

            return $this->view(
                'salgado.pages.category.create_edit',
                compact('category')
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }
    }

    /**
     * Deleting a cat from db
     *
     * @param $id
     * @return Redirect
     */
    public function destroy($id)
    {
        try {
            return $this->generalDestroy($id, 'Pardisan\Commands\Category\Delete\BulkCommand');
        }catch (DeleteDeniedException $e){
            return $this->redirectBack()->with('error_message', $this->lang->get($e->getLangKey()));
        }
    }

    /**
     * Storing a cat in db
     *
     * @return Redirect
     */
    public function store(){
        try {
            $created = $this->execute('Pardisan\Commands\Category\Store\Command');
            return $this->redirectRoute('admin.categories.index')->with(
                'success_message',
                $this->lang->get('messages.categories.success_update', ['name' => $created->name])
            );
        }catch (NotFoundException $e){
            App::abort(404);
        }catch(FormValidationException $e){
            return $this->redirectBack()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Updating a cat in db
     *
     * @param $id
     * @return Redirect
     */
    public function update($id){

    }

} 
