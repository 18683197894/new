<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SysSystemConfig extends Model
{
    protected $table  = 'sys_systemconfig';
    protected $dateFormat = 'U';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
}
