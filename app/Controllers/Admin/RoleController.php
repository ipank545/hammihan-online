<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Translation\Translator;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\NotFoundException;

class RoleController extends BaseController
{

    protected $lang;

    public function __construct(
        Translator $lang
    ){
        $this->lang = $lang;
    }

    /**
     * List roles
     *
     * @return View
     */
    public function index()
    {
        $roles = $this->execute('Pardisan\Commands\Role\RoleIndexCommand');
        return $this->view(
            'salgado.pages.role.index',
            compact('roles')
        );
    }

    /**
     * Delete a role from repo
     *
     * @return Redirect
     */
    public function destroy()
    {
        $items = $this->request->input('deleteable_items',[]);

        try {

            $count = $this->execute('Pardisan\Commands\Role\BulkDeleteCommand', ['deleteables' => $items]);
            return $this->redirectRoute('admin.roles.index')->with(
                'success_message',
                $this->lang->get(
                    'messages.roles.success_deleting_items',
                    ['count' => $count]
                )
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }catch(FormValidationException $e){

            return $this->redirectBack()->withErrors($e->getErrors());

        }
    }
} 
