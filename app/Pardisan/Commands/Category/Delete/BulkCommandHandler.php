<?php namespace Pardisan\Commands\Category\Delete; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractBulkDeleteCommandHandler;
use Pardisan\Repositories\CategoryRepositoryInterface;

class BulkCommandHandler extends AbstractBulkDeleteCommandHandler implements CommandHandler
{
    protected $catRepo;

    public function __construct(
        CategoryRepositoryInterface $cateRepo
    ){
        $this->catRepo = $cateRepo;
    }

    protected function getRepo()
    {
        return $this->catRepo;
    }
} 
