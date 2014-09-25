<?php namespace Pardisan\Commands\User; 

use Laracasts\Validation\FormValidator;

class UpdateCommandValidator extends FormValidator
{
    /**
     * Rules to validate against
     *
     * @var array
     */
    protected $rules = [
        'name'  =>  'required|min:3|max:50',
        'user_name' => 'required|unique:users,user_name|min:3|max:25',
        'email' =>  'required|email|unique:users,email',
        'phone' => 'min:6|max:20',
        'roles' => 'integer_array'
    ];

    /**
     * Do validation
     *
     * @param mixed $commandData
     * @return mixed
     * @throws \Laracasts\Validation\FormValidationException
     */
    public function validate($commandData)
    {
        $this->rules['user_name'][] = 'unique:states,user_name,' . $commandData->id;
        $this->rules['email'][] = 'unique:users,email,'. $commandData->id;
        return parent::validate($commandData);
    }
} 
