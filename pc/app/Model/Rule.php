<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rule';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function Cates()
    {
    	return $this->hasOne('\App\Model\Cate','id','cate_id');
    }
}
