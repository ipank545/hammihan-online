<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Translation\Translator;
use Laracasts\Validation\FormValidationException;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\Exceptions\RepositoryException;

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
    public function bulkDestroy()
    {
        $items = $this->request->input('deleteable_items',[]);

        try {

            $count = $this->execute(
                'Pardisan\Commands\Role\BulkDeleteCommand',
                ['deleteables' => $items]
            );

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

    /**
     * Single Delete method
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $id = (array) $id;
        try {

            $deleted = $this->execute(
                'Pardisan\Commands\Role\BulkDeleteCommand',
                ['deleteables' => $id]
            );

            return $this->redirectRoute('admin.roles.index')->with(
                'success_message',
                $this->lang->get(
                    'messages.roles.success_deleting_items',
                    ['count' => $deleted]
                )
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }catch (FormValidationException $e){

            return $this->redirectBack()->withErrors($e->getErrors());

        }
    }

    /**
     * Storing role command
     *
     * @return Redirect
     */
    public function store()
    {

        $input = $this->request->only('name');

        try {

            $created = $this->execute(
                'Pardisan\Commands\Role\NewCommand',
                $input
            );

            return $this->redirectRoute('admin.roles.index')->with(
                'success_message',
                $this->lang->get(
                    'messages.roles.success_store',
                    ['machine_name' => $created->name]
                )
            );

        }catch (RepositoryException $e){

            return $this->redirectRoute('admin.roles.index')->with(
                'error_message',
                'messages.repository_error'
            );

        }catch (FormValidationException $e){

            return $this->redirectBack()
                        ->withErrors($e->getErrors())
                        ->withInput();
        }
    }

    /**
     * Update a role
     *
     * @param $id
     */
    public function update($id)
    {
        $input = $this->request->only('name');
        $input ['id'] = $id;
        try {

            $updated = $this->execute(
                'Pardisan\Commands\Role\UpdateCommand',
                $input
            );

            return $this->redirectBack()->with(
                'success_message',
                $this->lang->get(
                    'messages.roles.success_update',
                    ['id' => $updated->id]
                )
            );

        }catch (NotFoundException $e){

            App::abort(404);

        }catch (FormValidationException $e){

            return $this->redirectBack()
                        ->withErrors($e->getErrors())
                        ->withInput();

        }
    }
} 
