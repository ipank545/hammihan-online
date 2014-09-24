<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Laracasts\Validation\FormValidationException;
use Pardisan\Commands\User\Exceptions\InvalidOldPasswordException;
use Pardisan\Models\User;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\Exceptions\RepositoryException;

class UserController extends BaseController
{
    public function index()
    {
        $users = $this->execute('Pardisan\Models\User\IndexCommand');

        return $this->view(
            'salgado.pages.user.index',
            compact('users')
        );
    }

    public function create()
    {
        return $this->view('salgado.pages.user.create_update');
    }

    public function edit($id)
    {
        try {

        }catch (NotFoundException $e){
            App::abort(404);
        }
    }

    public function destroy()
    {

    }

    public function store()
    {

    }

    public function update($id)
    {

    }
} 
