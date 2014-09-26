<?php namespace Pardisan\Commands\Article;

use Laracasts\Validation\FormValidator;

class EditCommandValidator extends FormValidator {

    protected $rules = [
        'id'         =>  'required|exists:articles,id'
        //'user_id'    =>  'required|exists:users,id'
    ];

} 