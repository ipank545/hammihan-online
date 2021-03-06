<?php namespace Pardisan\Models; 

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManys
     */
    public function articles()
    {
        return $this->hasMany('Pardisan\Models\Article', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('Pardisan\Models\User', 'user_category', 'category_id', 'user_id');
    }

} 
