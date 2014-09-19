<?php namespace Pardisan\Commands\Auth;

use Laracasts\Validation\FormValidator;

class LoginValidator extends FormValidator
{
    protected  $rules = [
        'identifier'    =>  'required',
        'password'      =>  'required'
    ];
} 
