<?php namespace Pardisan\Commands\Image; 

use Laracasts\Validation\FormValidator;

class GeneratorValidator extends FormValidator
{
    protected $rules = [
        'address' => 'required'
    ];
} 
