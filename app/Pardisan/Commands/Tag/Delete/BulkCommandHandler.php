<?php namespace Pardisan\Commands\Tag\Delete; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractBulkDeleteCommandHandler;
use Pardisan\Repositories\TagRepositoryInterface;

class BulkCommandHandler extends AbstractBulkDeleteCommandHandler implements CommandHandler
{
    protected $tagRepo;

    public function __construct(TagRepositoryInterface $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    protected function getRepo()
    {
        return $this->tagRepo;
    }
} 
