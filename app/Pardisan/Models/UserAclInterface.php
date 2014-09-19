<?php namespace Pardisan\Models;

interface UserAclInterface {
    /**
     * Check that user can do the action or not
     *
     * @param $what
     * @return boolean
     */
    public function can($what);

    /**
     * Check users role
     *
     * @param $role
     * @return boolean
     */
    public function hasRole($role);

    /**
     * Check against all
     *
     * @param $roles
     * @param $permissions
     * @param array $options
     * @return mixed
     */
    public function ability($roles, $permissions, $options = array());
} 
