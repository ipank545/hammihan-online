<?php namespace Pardisan\Commands; 

abstract class AbstractCommandHandler
{
    /**
     * Command DTO
     *
     * @var \StdClass
     */
    public $command;

    /**
     * Set command data
     *
     * @param   $command
     * @return  $this
     */
    public function setCommand($command)
    {
        $this->command = $command;
        return $this;
    }

    /**
     * Get command data
     *
     * @return \StdClass
     */
    public function getCommand()
    {
        return $this->command;
    }
} 
