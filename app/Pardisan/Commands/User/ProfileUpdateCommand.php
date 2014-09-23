<?php namespace Pardisan\Commands\User; 

class ProfileUpdateCommand
{
    public $name;
    public $username;
    public $password;
    public $password_confirmation;
    public $old_password;
    public $voip_id;
    public $phone;
    public $email;

    public function __construct(
        $name,
        $username,
        $email,
        $password,
        $password_confirmation,
        $old_password,
        $voip_id,
        $phone
    ){
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
        $this->old_password = $old_password;
        $this->voip_id = $voip_id;
        $this->phone = $phone;
        $this->email = $email;
    }
} 
