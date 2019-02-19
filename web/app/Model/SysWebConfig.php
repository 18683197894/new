<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SysWebConfig extends Model
{
    protected $table = 'sys_webconfig';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
