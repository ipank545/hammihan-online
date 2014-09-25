<?php namespace Pardisan\Models;

use Bigsinoos\JEloquent\PersianDateTrait;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $guarded = ['id', 'commentable_type',];

    use PersianDateTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

} 
