<?php namespace Pardisan\Commands\State; 

use Laracasts\Validation\FormValidator;

class UpdateArticleStateValidator extends FormValidator
{
    /**
     * Rules to validate against
     *
     * @var array
     */
    protected $rules = [
        'machine_name'  =>  ['required', 'alpha_dash'],
        'display_name'  =>  ['required'],
        'priority'      =>  ['integer']
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
        $this->rules['machine_name'][] = 'unique:states,machine_name,' . $commandData->id;
        $this->rules['priority'][] = 'unique:states,priority,'. $commandData->id;
        return parent::validate($commandData);
    }
} 
