<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SysZendConfig extends Model
{
    protected $table = 'sys_zendconfig';
    protected $primaryKey = 'id';
    protected $dateFormat = 'U';
    protected $guarded = ['id'];
}
