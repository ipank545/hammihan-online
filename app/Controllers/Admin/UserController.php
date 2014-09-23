<?php namespace Controllers\Admin; 

use Controllers\BaseController;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Laracasts\Validation\FormValidationException;
use Pardisan\Commands\User\Exceptions\InvalidOldPasswordException;
use Pardisan\Repositories\Exceptions\RepositoryException;

class UserController extends BaseController
{
    public function meEdit()
    {
        return 'edit my profile';
    }
} 
