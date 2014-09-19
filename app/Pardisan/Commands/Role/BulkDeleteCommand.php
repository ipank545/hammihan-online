<?php namespace Pardisan\Commands\Role; 

class BulkDeleteCommand
{
    public $deleteables;

    public function __construct($deleteables)
    {
        $this->deleteables = $deleteables;
    }
} 
