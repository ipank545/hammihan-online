<?php namespace Pardisan\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent  implements
    UserInterface,
    RemindableInterface,
    UserAclInterface
{

	use UserTrait, RemindableTrait, HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $guarded = ['persist_code', 'remember_token'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token', 'persist_code');

    /**
     * User's identifier
     *
     * @return string
     */
    public function identifier()
    {
        if (! is_null($this->name)) return $this->name;
        return $this->user_name;
    }

    /**
     * User articles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('Pardisan\Models\Article', 'user_id');
    }

    /**
     * Articles that user has touched
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articlesStates()
    {
        return $this->belongsToMany('Pardisan\Models\Article', 'article_states', 'article_id', 'user_id');
    }

}
