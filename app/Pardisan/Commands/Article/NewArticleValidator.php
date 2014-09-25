<?php namespace Pardisan\Commands\Article;

use Laracasts\Validation\FormValidator;

class NewCommandValidator extends FormValidator {

    protected $rules = [
        'user_id'         =>  'required|exists:users,id',
       // 'body'            =>  'required',
        'important_title' =>  'required',
       // 'status_id'       =>  'required',
        'publish_date'    =>  'required',
        'summary'         =>  'required'
    ];

} 