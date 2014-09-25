<?php namespace Pardisan\Commands\User; 

trait HandlerHelperTrait {
    /**
     * Get data needed for creating a new user
     *
     * @return array
     */
    protected function getUserData()
    {
        $data = get_object_vars($this->getCommand());
        $unsetables = ['password_confirmation', 'roles'];

        foreach($unsetables as $unset) {
            if (isset($data[$unset])) unset($data[$unset]);
        }

        return $unsetables;
    }

    /**
     * Get command roles and add them to the new created roles
     *
     * @param $user
     * @return mixed
     */
    protected function addCommandRolesToUser($user)
    {
        $availableRoles = $this->roleRepo->getAll();

        $command = $this->getCommand();
        $commandRoles = ! empty($command->roles) ? (array) $command->roles : false;

        if (! $commandRoles) return $user;

        $saveableRoles = [];
        foreach($availableRoles as $availableRole) {
            if(in_array($availableRole->id, $commandRoles)){
                $saveableRoles [] = $availableRole->id;
            }
        }

        return $this->roleRepo->addRolesToUser($user, $saveableRoles);
    }
} 
