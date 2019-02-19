<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DynamicNews extends Model
{
    protected $table = 'dynamic_news';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];
    
    public function Classify()
    {
    	return $this->hasOne('App\Model\DynamicNewsClassify','id','classify_id');
    }
    public function Label()
    {
        return $this->hasOne('App\Model\DynamicLabel','id','label_id');
    }
}
