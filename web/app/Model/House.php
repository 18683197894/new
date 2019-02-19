<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'house';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Backend()
    {
    	return $this->hasOne('App\Model\MemberBackend','id','backend_id');
    }
    public function Front()
    {
    	return $this->hasOne('App\Model\MemberFront','id','front_id');
    }

    public function Project()
    {
        return $this->hasOne('App\Model\Project','id','project_id');
    }

    public function HouseSchedules()
    {
        return $this->hasMany('App\Model\HouseSchedule','house_id','id');
    }
}
