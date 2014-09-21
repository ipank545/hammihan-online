<?php namespace Controllers\Admin;

use Controllers\BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Translation\Translator;

class PermissionController extends BaseController {

    /**
     * @var Translator
     */
    protected $lang;

    /**
     * @param Translator $lang
     */
    public function __construct(
        Translator $lang
    )
    {
        $this->lang = $lang;
    }

    /**
     * List all available permissions and their attached roles
     *
     * @return View
     */
    public function index()
    {
        $roles = $this->execute('Pardisan\Commands\Role\RoleIndexCommand');
        $permissions = $this->execute ('Pardisan\Commands\Permission\InfoCommand');
        return $this->view(
            'salgado.pages.permissions.index',
            compact('roles', 'permissions')
        );
    }
} 