<?php namespace Pardisan\Commands\State; 

class UpdateArticleStateCommand
{
    /**
     * Machine name only english chars
     *
     * @var string
     */
    public $machine_name;

    /**
     * Display name
     *
     * @var string
     */
    public $display_name;

    /**
     * @var integer
     */
    public $priority;

    /**
     * To be updated id
     *
     * @var integer
     */
    public $id;

    /**
     * @param $machine_name
     * @param $display_name
     * @param $priority
     * @param $id
     */
    public function __construct(
        $machine_name,
        $display_name,
        $priority,
        $id
    ){
        $this->machine_name = $machine_name;
        $this->display_name = $display_name;
        $this->priority = $priority;
        $this->id = $id;
    }
} 
