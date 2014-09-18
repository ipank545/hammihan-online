<?php namespace Pardisan\Commands\Auth; 

use Laracasts\Commander\CommandHandler;
use Pardisan\Commands\AbstractCommandHandler;
use Pardisan\Commands\Auth\Exceptions\InvalidCredentialsException;

class LoginCommandHandler extends  AbstractCommandHandler implements CommandHandler
{
    /**
     * Handle the command
     *
     * @param $command
     * @throws InvalidCredentialsException
     * @return mixed
     */
    public function handle($command)
    {
        foreach($this->availableIdentifiers() as $identifier){
            $attemptable = [
                $identifier => $command->identifier,
                'password'  => $command->password
            ];
            if ($this->authManager->attempt($attemptable, $command->remember)){
                return true;
            }
        }
        $this->throwError();
    }

    /**
     * Login with username/email/id
     *
     * @return array
     */
    private function availableIdentifiers()
    {
        return [
            'email',
            'username',
            'id'
        ];
    }

    /**
     * Throw error if auth fails
     *
     * @throws InvalidCredentialsException
     */
    private function throwError()
    {
        $error = new InvalidCredentialsException("Invalid credentials");
        $error->setLangKey('invalid_credentials');
        throw $error;
    }
}
