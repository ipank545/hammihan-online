<?php namespace Pardisan\Commands\Auth;

class LoginCommand
{
    public $identifier;
    public $password;
    public $remember;

    public function __construct(
        $identifier,
        $password,
        $remember
    ){
        $this->identifier = $identifier;
        $this->password = $password;
        $this->remember = $remember;
    }
} 
