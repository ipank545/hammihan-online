<?php namespace Pardisan\Commands\State; 

use Laracasts\Validation\FormValidator;

class NewArticleStateValidator extends FormValidator
{
    protected $rules = [
        'machine_name'      =>  'required|min:3|max:25|alpha_dash',
        'display_name'      =>  'required',
        'priority'          =>  'unique:states,priority|integer'
    ];
} 
