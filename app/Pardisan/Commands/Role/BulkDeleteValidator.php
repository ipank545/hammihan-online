<?php namespace Pardisan\Commands\Role; 

use Illuminate\Support\Facades\Lang;
use Laracasts\Validation\FormValidator;

class BulkDeleteValidator extends FormValidator
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
