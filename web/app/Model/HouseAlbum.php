<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HouseAlbum extends Model
{
    protected $table = 'house_album';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Schedule()
    {
    	return $this->hasOne('App\Model\HouseSchedule','id','schedule_id');
    }
}
