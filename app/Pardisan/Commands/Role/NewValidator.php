<?php namespace Pardisan\Commands\Role;

use Laracasts\Validation\FormValidator;

class NewValidator extends FormValidator{
    protected $rules = [
        'name'  =>  'required|min:3|max:25|unique:roles,name'
    ];
} 