<?php namespace Pardisan\Models; 

use Pardisan\Support\Date\PersianDateTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use PersianDateTrait;

    protected $guarded = [];

} 
