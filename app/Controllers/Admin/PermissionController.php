<?php namespace Controllers\Admin;

use Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Translation\Translator;
use Pardisan\Repositories\Exceptions\RepositoryException;

class PermissionController extends BaseController {

    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param Translator $lang
     * @param Request $request
     */
    public function __construct(
        Translator $lang,
        Request $request
    )
    {
        $this->lang = $lang;
        $this->request = $request;
    }

    /**
     * List all available permissions and their attached roles
     *
     * @return View
     */
    public function index()
    {
        $roles = $this->execute('Pardisan\Commands\Role\RoleIndexCommand')->toArray();

        $permissions = $this->execute('Pardisan\Commands\Permission\InfoCommand')->toArray();

        $rolePermissions =


        return $this->view(
            'salgado.pages.permissions.index',
            compact('roles', 'permissions')
        );
    }

    public function update()
    {
        $roles = $this->request->get('roles',[]);

        try {

            $this->execute('Pardisan\Commands\Permission\PermRoleCommand', ['roles' => $roles]);

            return $this->redirectRoute('admin.permissions.index')->with(
                'success_message',
                $this->lang->get('messages.permissions.update_success')
            );

        }catch (RepositoryException $e){

            return $this->redirectBack()->with(
                'error_message',
                $this->lang->get('messages.repository_error')
            );

        }

    }
} 
