<?php namespace Pardisan\Commands\Auth;

use Laracasts\Validation\FormValidator;

class LoginCommandValidator extends FormValidator
{
    public $rules = [
        'identifier'    =>  'required',
        'password'      =>  'required'
    ];
} 
