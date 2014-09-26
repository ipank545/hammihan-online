<?php namespace Pardisan\Models; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class State extends Eloquent
{
    /**
     * Table of the model
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * created_at , updated_at : default
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Bypass mass assignment exception
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Relationship between articles and states
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('Pardisan\Models\Article', 'article_states', 'state_id', 'article_id');
    }

    /**
     * User touched states
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userStates()
    {
        return $this->belongsToMany('Pardisan\Models\User', 'article_states', 'state_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('Pardisan\Models\Role', 'role_states', 'state_id', 'role_id');
    }
} 
