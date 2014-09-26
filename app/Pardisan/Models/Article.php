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
   // public function getDates()
   // {
   //     return  ['created_at', 'updated_at', 'publish_date'];
   // }

    /**
     * Relationship between articles and states
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany('Pardisan\Models\State', 'article_states', 'state_id', 'article_id');
    }

    /**
     * Users that has touched the article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articleUsers()
    {
        return $this->belongsToMany('Pardisan\Models\User', 'article_states', 'user_id', 'article_id');
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
} 
