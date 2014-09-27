<?php namespace Pardisan\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Pardisan\Support\Date\PersianDateTrait;

class Article extends Model {

    /**
     * Adding persian date to eloquent data sets
     */
    use PersianDateTrait;

    public static $homePageCats = [
        "news"              =>  'خبرگزاری',
        "talk"              =>  'گفتمان',
        "departmentOfFix"   =>  'پارلمان اصلاحات',
        "tribon"            =>  'تریبون',
        "guideline"         =>  'راهبرد',
        "brainRoom"         =>  'اتاق فکر',
        "meeting"           =>  'دیدار',
        "club"              =>  'باشگاه',
        "calendar"          =>  'تقویم',
        "cafe"              =>  'کافه',
        "network"           =>  'شبکه',
        "echo"              =>  'پژواک',
        "worldGroups"       =>  'احزاب ایران و جهان',
        "bazaar"            =>  'بازار',
        "counter"           =>  'پیشخوان'
    ];

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
    protected $guarded = ['id'];
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
        return $this->morphToMany('Pardisan\Models\Comment', 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany('Pardisan\Models\Tag','taggable');
    }

    public function scopeGetGuestSafeQuery($q)
    {
        return $q->whereHas('states', function($q){
            $q->orderBy('states.id', 'DESC')->where('viewable', true)->limit(1);
        });
    }

    public function category()
    {
        return $this->belongsTo('Pardisan\Models\Category', 'category_id');
    }

} 
