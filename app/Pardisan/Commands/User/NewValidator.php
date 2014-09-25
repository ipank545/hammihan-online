<?php namespace Pardisan\Commands\User; 

use Laracasts\Validation\FormValidator;

class NewValidator extends FormValidator
{
    protected $rules = [
        'name'  =>  'required|min:3|max:50',
        'user_name' => 'required|unique:users,user_name|min:3|max:25',
        'email' =>  'required|email|unique:users,email',
        'phone' => 'min:6|max:20',
        'roles' => 'integer_array'
    ];
} 
