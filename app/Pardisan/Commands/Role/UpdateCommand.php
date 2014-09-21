<?php namespace Pardisan\Commands\Role;

class UpdateCommand {

    /**
     * @var integer
     */
    public $id;

    /**
     * Should be unique on role data repo
     *
     * @var string
     */
    public $name;

    /**
     * @param $id
     * @param $name
     */
    public function __construct(
        $id,
        $name
    ){
        $this->id = $id;
        $this->name = $name;
    }
} 