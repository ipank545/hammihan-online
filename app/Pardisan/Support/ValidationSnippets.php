<?php namespace Pardisan\Support; 

use Illuminate\Validation\Validator;

class ValidationSnippets extends Validator
{
    public function validateIntegerArray($attribute, $values, $params)
    {
        foreach((array) $values as $value){
            if (filter_var($value, FILTER_VALIDATE_INT) === FALSE){
                return false;
            }
        }
        return true;
    }
} 
