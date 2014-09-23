<?php namespace Pardisan\Commands\User; 

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Hash;
use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Commands\User\Exceptions\InvalidOldPasswordException;
use Pardisan\Repositories\UserRepositoryInterface;

class ProfileUpdateCommandHandler extends AbstractCommandHandler implements CommandHandler
{
    protected $auth;
    protected $userRepo;
    protected $foundUser;

    public function __construct(
        AuthManager $auth,
        UserRepositoryInterface $userRepo
    ){
        $this->userRepo = $userRepo;
        $this->auth = $auth;
        $this->user = $this->auth->user();
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->setCommand($command);
        $this->foundUser = $this->getUser();
        $this->checkOldPassword();
        return $this->userRepo->updateUser($this->foundUser, $this->getUpdateData());
    }

    protected function getUser()
    {
        return $this->userRepo->findById($this->user->id);
    }

    protected function getUpdateData()
    {
        return [
            'name'          =>  $this->command->name,
            'user_name'     =>  $this->command->username,
            'email'         =>  $this->command->email,
            'password'      =>  ! empty($this->command->password) ? Hash::make($this->command->password) : $this->foundUser->passwrod,
            'voip_id'       =>  $this->command->voip_id,
            'phone'         =>  $this->command->phone
        ];
    }

    protected function checkOldPassword()
    {
        if (! empty($this->command->password)){
            if (! Hash::check($this->command->old_password, $this->foundUser->password)){
                throw new InvalidOldPasswordException("Password are not the same");
            }
        }
    }
}
