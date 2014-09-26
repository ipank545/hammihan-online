<?php namespace Pardisan\Commands\User; 

class IndexCommand
{
    public function __construct(
        $id = null,
        $name = null,
        $user_name = null,
        $email = null,
        $phone = null,
        $voip_id = null
    ){
        $this->id = $id;
        $this->name = $name;
        $this->user_name = $user_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->voip_id = $voip_id;
    }
} 
