<?php namespace Pardisan\Support\AccessControl\Contracts;

use Pardisan\Models\User;

interface BridgeInterface {
    /**
     * Set user to check access against
     *
     * @param User $user
     * @return $this
     */
    public function setUser(User $user);

    /**
     * Set user by his/her id
     *
     * @param $id
     * @return $this
     */
    public function setUserById($id);

    /**
     * Set user from auth
     *
     * @return $this
     */
    public function setUserByAuth();
} 
