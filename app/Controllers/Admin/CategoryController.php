<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Pardisan\Repositories\CategoryRepositoryInterface;
use Pardisan\Repositories\Exceptions\NotFoundException;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $catRepo;

    /**
     * @param CategoryRepositoryInterface $catRepo
     */
    public function __construct(
        CategoryRepositoryInterface $catRepo
    ){
        $this->catRepo = $catRepo;
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
        return $this->view('admin.pages.category.create_edit');
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
                'admin.pages.category.create_edit',
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
        return $this->generalDestroy($id, 'Pardisan\Commands\Category\Delete\Command');
    }

    /**
     * Storing a cat in db
     *
     * @return Redirect
     */
    public function store(){}

    /**
     * Updating a cat in db
     *
     * @param $id
     * @return Redirect
     */
    public function update($id){}

} 
