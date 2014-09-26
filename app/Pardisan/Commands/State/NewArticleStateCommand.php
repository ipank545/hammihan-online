<?php namespace Pardisan\Commands\State; 

class NewArticleStateCommand
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
     * @param $machine_name
     * @param $display_name
     * @param $priority
     */
    public function __construct(
        $machine_name,
        $display_name,
        $priority
    ){
        $this->machine_name = $machine_name;
        $this->display_name = $display_name;
        $this->priority = $priority;
    }
} 
