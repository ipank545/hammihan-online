<?php namespace Pardisan\Models;

use Illuminate\Database\Eloquent\Model;
use Pardisan\Support\Date\PersianDateTrait;

class Article extends Model {

    use PersianDateTrait;

    protected $table = 'articles';
    protected $fillable = ['first_title','second_title','important_title','summary','body','publish_date','status_id','author','slug_url'];


} 