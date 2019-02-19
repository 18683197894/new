<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function Houses()
    {
    	return $this->hasMany('App\Model\House','project_id','id');
    }
}
