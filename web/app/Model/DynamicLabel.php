<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicLabel extends Model
{
    protected $table = 'dynamic_label';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function News()
    {
    	return $this->hasMany('App\Model\DynamicNews','label_id','id');
    }
}
