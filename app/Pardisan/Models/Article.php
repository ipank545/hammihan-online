<?php namespace Pardisan\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model {

    protected $table = 'articles';
    protected $fillable = ['first_title','second_title','important_title','summary','body','publish_date','status_id','author','slug_url'];

    public function getDates ()
    {
        return ['created_at', 'updated_at', 'publish_date'];
    }
} 