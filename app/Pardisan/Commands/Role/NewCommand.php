<?php namespace Pardisan\Commands\Role;

class NewCommand {

    /**
     * @var string
     */
    public $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
} 