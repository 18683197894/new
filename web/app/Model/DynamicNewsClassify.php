<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicNewsClassify extends Model
{
        protected $table = 'dynamic_news_classify';
    	protected $dateFormat = 'U';
    	protected $primaryKey = 'id';
    	protected $guarded = [];

    	public function Newss()
    	{
    		return $this->hasMany('App\Model\DynamicNews','classify_id','id');
    	}
}
