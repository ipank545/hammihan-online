<?php namespace Pardisan\Commands\Article;

class DeleteCommand
{
    public $deleteables;

    public function __construct($deleteables)
    {
        $this->deleteables = $deleteables;
    }
}
