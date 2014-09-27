<?php namespace Pardisan\Repositories\Eloquent; 

use Pardisan\Models\Article;
use Pardisan\Models\Role;
use Pardisan\Models\State;
use Pardisan\Models\User;
use Pardisan\Repositories\StateRepositoryInterface;

class StateRepository extends AbstractRepository implements StateRepositoryInterface
{
    /**
     * @param State $stateModel
     */
    public function __construct(State $stateModel)
    {
        $this->model = $stateModel;
    }

    /**
     * Do update
     *
     * @param State $state
     * @param array $data
     * @return mixed
     */
    public function update(State $state, array $data)
    {
        $state->fill($data);
        $state->save();
        return $state;
    }

    public function getAllWithRoles()
    {
        return $this->model->newInstance()->with('roles')->orderBy('priority')->get();
    }

    public function addStatesToRole(Role $role, array $insertables)
    {
        $role->states()->sync($insertables);
        return $role;
    }

    public function addStateToArticle(Article $article, $state_id, $last = true, $user_id = null)
    {
        $article->states()->attach([$state_id => [
                'last' => $last,
                'user_id' => $user_id
            ]
        ]);
        return $article;
    }

    public function loadUserAvailableStates(User $user)
    {
        return $user->articlesStates()->get();
    }
}
