<?php namespace Pardisan\Commands\Role; 

use Laracasts\Validation\FormValidator;

class BulkDeleteValidator extends FormValidator
{
    protected $rules = [
        'deleteables' => 'integer_array|required'
    ];
} 
