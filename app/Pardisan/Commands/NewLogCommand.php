<?php namespace Pardisan\Commands;


class NewLogCommand {

    public $userId;
    public $message;

    public function __construct($user_id = null, $message){
        $this->userId = $user_id;
        $this->message = $message;
    }
}