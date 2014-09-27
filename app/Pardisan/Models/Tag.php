<?php namespace Pardisan\Models; 

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    /**
     * @var string
     */
    protected $table = 'tags';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public function articles()
    {
        return $this->morphedByMany('Pardisan\Models\Article', 'taggable');
    }

} 
