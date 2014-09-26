<?php namespace Pardisan\Models; 

use Pardisan\Support\Date\PersianDateTrait;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use PersianDateTrait;

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states()
    {
        return $this->belongsToMany('Pardisan\Models\State', 'role_states', 'role_id', 'state_id');
    }

} 
