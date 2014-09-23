<?php namespace Pardisan\Commands\User; 

use Illuminate\Auth\AuthManager;
use Laracasts\Validation\FactoryInterface;
use Laracasts\Validation\FormValidator;

class ProfileUpdateValidator extends FormValidator
{
    protected $auth;
    protected $rules;
    protected $user;

    public function __construct(FactoryInterface $valFactory ,AuthManager $auth)
    {
        $this->auth = $auth;
        $this->user = $this->auth->user();
        parent::__construct($valFactory);
    }

    public function getValidationRules()
    {
        $userId = $this->getUserId();

        return $this->rules = [
            'name'              =>  'required',
            'email'             =>  'required|unique:users,email,' . $userId . '|email',
            'username'          =>  'required|unique:users,user_name,' . $userId . '|min:3',
            'password'          =>  'confirmed',
            'old_password'      =>  'required_with:password',
        ];
    }

    protected function getUserId()
    {
        return $this->user->id;
    }
} 
