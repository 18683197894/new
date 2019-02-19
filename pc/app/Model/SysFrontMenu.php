<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SysFrontMenu extends Model
{
    protected $table = 'sys_frontmenu';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getMenus()
    {
    	return $this->hasMany('App\Model\SysFrontMenu','pid','id');
    }
}
