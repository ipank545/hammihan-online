<?php namespace Pardisan\Commands\User; 

use Illuminate\Support\Facades\Hash;
use Pardisan\Models\User;

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
            unset($data[$unset]);
        }

        $data ['password'] = ! empty($data['password']) ? Hash::make($data['password']) : $data['password'];
        return $data;
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

        $saveableRoles = [];

        if ($commandRoles){
            foreach($availableRoles as $availableRole) {
                if(in_array($availableRole->id, $commandRoles)){
                    $saveableRoles [] = $availableRole->id;
                }
            }
        }

        return $this->roleRepo->addRolesToUser($user, $saveableRoles);
    }

    /**
     * Add or sync command categories to user
     *
     * @param $user
     * @return User
     */
    protected function addCommandCategoriesToUser($user)
    {
        $availableCats = $this->catRepo->getAll();

        $command = $this->getCommand();
        $commandCats = ! empty($command->categories) ? (array) $command->categories : false;

        $saveableCats = [];

        if ($commandCats){
            foreach($availableCats as $cat){
                if(in_array($cat->id, $commandCats)){
                    $saveableCats [] = $cat->id;
                }
            }
        }

        return $this->catRepo->addCategoriesToUser($user, $saveableCats);
    }
} 
