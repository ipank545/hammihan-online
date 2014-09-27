<?php namespace Pardisan\Commands\Article; 

use Laracasts\Validation\FormValidator;

class NewValidator extends FormValidator
{
    protected $rules = [
        'user_id'         =>  'required|exists:users,id',
        'body'            =>  'required',
        'important_title' =>  'required|max:250',
        'category_id'     =>  'required|integer|exists:categories,id',
        'state_id'        =>  'integer|required|exists:states,id',
        'publish_date'    =>  'max:50',
        'summary'         =>  'required',
        'thumb_image'     =>  'required',
        'first_title'     =>  'max:250',
        'second_title'    =>  'max:250',
        'tags'            =>  'min:2'
    ];
} 
