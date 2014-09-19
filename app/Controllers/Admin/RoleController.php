<?php namespace Controllers\Admin; 

use Controllers\BaseController;

class RoleController extends BaseController
{
    public function index(){
        $roles = $this->execute('Pardisan\Commands\Role\RoleIndexCommand');
        return $this->view(
            'salgado.pages.role.index',
            compact('roles')
        );
    }
} 
