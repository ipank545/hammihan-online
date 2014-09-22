<?php namespace Pardisan\ArtisanCommands;

use Illuminate\Console\Command;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\PermissionRepositoryInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class PermissionGeneratorCommand extends Command {

    /**
     * First ask for user
     *
     * @var bool
     */
    protected $firstReq = true;

    /**
     * @var PermissionRepositoryInterface
     */
    protected $permRepo;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'perm:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generating a new permission.';

    /**
     * Create a new command instance.
     *
     * @param PermissionRepositoryInterface $permRepo
     * @return \Pardisan\ArtisanCommands\PermissionGeneratorCommand
     */
	public function __construct(
        PermissionRepositoryInterface $permRepo
    )
	{
		parent::__construct();
        $this->permRepo = $permRepo;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $yeses = ['yes', 'y', 1];

        $continue = true;
		while ($continue == true){
            $this->firstReq = false;
            $permName = $this->ask('Permission name: ', false);
            if (! $permName){
                $this->error('a unique name for permission is needed.');
                continue;
            }

            try {
                $this->permRepo->findBy('name', $permName);
                $this->error("Another permission with name : [{$permName}] exists please try another");
                continue;
            }catch (NotFoundException $e){
                $created = $this->permRepo->createRaw(['name' => $permName, 'display_name' => $permName]);
                $this->info("a permission with unique name: [{$created->name}] created successfully");
            }
            $continue = in_array($this->ask("Do you want to continue? [y/n] : ", false), $yeses) ? true : false;
        }
        $this->info("Thanks!");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
