<?php namespace Pardisan\Commands;

use Laracasts\Commander\CommandHandler;
use Pardisan\Repositories\LogRepositoryInterface;

class NewLogCommandHandler implements CommandHandler {

    protected $l;

    public function __construct(LogRepositoryInterface $l)
    {
        $this->l = $l;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->l->create(get_object_vars($command));
    }
}