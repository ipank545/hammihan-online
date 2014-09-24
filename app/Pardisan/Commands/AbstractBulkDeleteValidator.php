<?php namespace Pardisan\Commands; 

use Illuminate\Support\Facades\Lang;
use Laracasts\Validation\FormValidator;

abstract class AbstractBulkDeleteValidator extends FormValidator
{
    protected $rules = [
        'deleteables' => 'integer_array|required'
    ];

    /**
     * @return mixed
     */
    public function getValidationMessages()
    {
        return ['required' => Lang::get('messages.roles.bulk_delete_required')];
    }
} 
