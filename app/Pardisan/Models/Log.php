<?php namespace Pardisan\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model{

    protected $table = 'logs';
    protected $fillable = ['message','user_id'];

}