<?php namespace Pardisan\Commands\User; 

class UpdateCommand {

    public $name;
    public $user_name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;
    public $voip_id;

    public function __construct(
        $name,
        $user_name,
        $email,
        $voip_id,
        $id,
        $phone,
        $roles,
        $password,
        $password_confirmation
    ){
        $this->name = $name;
        $this->user_name = $user_name;
        $this->email = $email;
        $this->voip_id = $voip_id;
        $this->id = $id;
        $this->phone = $phone;
        $this->password = $password;
        $this->password_confimation = $password_confirmation;
    }
} 
