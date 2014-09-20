<?php namespace Pardisan\Commands\Article;

use Laracasts\Validation\FormValidator;

class NewValidator extends FormValidator {

    protected $rules = [
        'user_id'         =>  'required|exists:users,id',
        'body'            =>  'required',
        'important_title' =>  'required',
        'status_id'       =>  'required',
        'published_at'    =>  'required',
        'summary'         =>  'required'
    ];

} 