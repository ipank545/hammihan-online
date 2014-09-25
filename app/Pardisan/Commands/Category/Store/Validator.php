<?php namespace Pardisan\Commands\Category\Store; 

use Laracasts\Validation\FormValidator;

class Validator extends FormValidator
{
    protected $rules = [
        'name'  =>  'max:150|required',
        'slug'  =>  'min:2|max:150'
    ];
} 
