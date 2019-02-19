<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SysMenu extends Model
{
    protected $table = 'sys_menu';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getMenus()
    {
    	return $this->hasMany('App\Model\SysMenu','pid','id');
    }
    public function getMenu()
    {
    	return $this->hasOne('App\Model\SysMenu','id','pid');
    }
}
