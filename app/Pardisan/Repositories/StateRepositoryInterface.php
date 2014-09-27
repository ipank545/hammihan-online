<?php namespace Pardisan\Repositories;

use Pardisan\Models\Article;
use Pardisan\Models\Role;
use Pardisan\Models\State;
use Pardisan\Models\User;

interface StateRepositoryInterface {
    /**
     * Do update
     *
     * @param State $state
     * @param array $data
     * @return mixed
     */
    public function update(State $state, array $data);

    public function getAllWithRoles();

    public function addStatesToRole(Role $role, array $insertables);

    public function addStateToArticle(Article $article, $state_id, $last = true, $user_id = null);

    public function loadUserAvailableStates(User $user);
} 
