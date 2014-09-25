<?php namespace Pardisan\Commands\Role;

use Illuminate\Support\Facades\Lang;
use Laracasts\Validation\FormValidator;

class DeleteValidator extends FormValidator
{
    protected $rules = [
        'deleteables' => 'integer_array|required'
    ];

    /**
     * @return mixed
     */
    public function getValidationMessages()
    {
        return ['required' => Lang::get('messages.articles.bulk_delete_required')];
    }
} 
