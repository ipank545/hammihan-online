<?php namespace Pardisan\ArtisanCommands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Pardisan\Commands\Exceptions\ArtisanException\ArtisanException;
use Pardisan\Repositories\Exceptions\NotFoundException;
use Pardisan\Repositories\Exceptions\RepositoryException;
use Pardisan\Repositories\RepositoryWrapperInterface;
use Pardisan\Repositories\RoleRepositoryInterface;
use Pardisan\Repositories\UserRepositoryInterface;

class GenerateAdminCommand extends Command {

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;

    /**
     * @var RoleRepositoryInterface
     */
    protected $roleRepo;

    /**
     * @var RepositoryWrapperInterface
     */
    protected $repoWrapper;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user_generator:admin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate an admin user for the whole system';

    /**
     * Create a new command instance.
     *
     * @param UserRepositoryInterface $userRepo
     * @param RoleRepositoryInterface $roleRepo
     * @param RepositoryWrapperInterface $repoWrapper
     */
	public function __construct(
        UserRepositoryInterface $userRepo,
        RoleRepositoryInterface $roleRepo,
        RepositoryWrapperInterface $repoWrapper
    )
	{
		parent::__construct();
        $this->roleRepo = $roleRepo;
        $this->userRepo = $userRepo;
        $this->repoWrapper = $repoWrapper;
	}

    /**
     * Execute the console command.
     *
     * @throws ArtisanException
     * @return mixed
     */
	public function fire()
	{
        $this->repoWrapper->begin();
        try {
            $user = $this->createUser();
            $roles = ['admin','authenticated'];
            $this->addRolesToUser($user, $roles);
        }catch (RepositoryException $e){
            $this->repoWrapper->failure();
            $this->error('Repository job roll backed');
            throw new ArtisanException($e->getMessage());
        }
        $this->repoWrapper->end();
        $this->info('User created successfully');
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

    /**
     * Create admin user
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createUser()
    {
        $user = $this->userRepo->createRaw([
            'user_name' => $this->ask('What is admin`s username? ', 'bigsinoos'),
            'password' => Hash::make($this->ask('What is admin`s password? ', '1q2w3e')),
            'email' =>  $this->ask('What is admin`s email? ', 'pcfeeler@gmail.com'),
            'name' => $this->ask('What is admin`s name? ', 'Reza Shadman')
        ]);
        return $user;
    }

    /**
     * Add roles to user
     *
     * @param $user
     * @param array $roles
     */
    private function addRolesToUser($user, array $roles)
    {
        foreach($roles as $role){
            try {
                $repoRoll = $this->roleRepo->findByName($role);
            }catch (NotFoundException $e){
                $repoRoll = $this->roleRepo->createRaw([
                    'name'  =>  $role
                ]);
            }
            $this->roleRepo->addRoleToUser($user, $repoRoll);
        }
    }

}
