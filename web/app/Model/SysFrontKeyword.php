<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SysFrontKeyword extends Model
{
    protected $table = 'sys_frontkeyword';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
