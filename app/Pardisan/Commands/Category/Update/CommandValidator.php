<?php namespace Pardisan\Commands\Category\Update; 

use Laracasts\Validation\FormValidator;

class CommandValidator extends FormValidator
{
    protected $rules = [
        'name'  =>  'max:150|required',
        'slug'  =>  'min:2|max:150'
    ];
} 
