<?php namespace Pardisan\Commands; 

abstract class AbstractBulkDeleteCommand
{
    public $deleteables;

    public function __construct($deleteables)
    {
        $this->deleteables = $deleteables;
    }
} 
