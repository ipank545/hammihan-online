<?php namespace Pardisan\Models;

use Illuminate\Database\Eloquent\Model;
use Pardisan\Support\Date\PersianDateTrait;

class Article extends Model {

    /**
     * Adding persian date to eloquent data sets
     */
    use PersianDateTrait;

    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * Allowed to fill
     *
     *
     * @TODO Convert this to guarded
     * @var array
     */
    protected $fillable = [
        'first_title',      'second_title',
        'important_title',  'summary',
        'body',             'publish_date',
        'status_id',        'author',
        'slug_url'
    ];

    /**
     * Fields to treat them as carbon objects
     *
     * @return array
     */
    public function getDates()
    {
        return  ['created_at', 'updated_at', 'publish_date'];
    }

    /**
     * Relationship between articles and states
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany('Pardisan\Models\State', 'article_states', 'article_id', 'state_id');
    }

    /**
     * Users that has touched the article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articleUsers()
    {
        return $this->belongsToMany('Pardisan\Models\User', 'article_states', 'article_id', 'user_id');
    }

    /**
     * Creator of the article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('Pardisan\Models\User', 'user_id');
    }

    /**
     * Article comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany('Pardisan\Models\Comment', 'commentable');
    }
} 
