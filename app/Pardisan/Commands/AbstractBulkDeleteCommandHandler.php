<?php namespace Pardisan\Commands; 

use Exception;

abstract class AbstractBulkDeleteCommandHandler extends AbstractCommandHandler
{
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->getRepo()->bulkDelete($command->deleteables);
    }

    protected function getRepo()
    {
        throw new Exception("You should provide a function to get repository to handle the delete");
    }
} 
