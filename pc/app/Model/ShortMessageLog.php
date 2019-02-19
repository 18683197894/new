<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShortMessageLog extends Model
{
    protected $table = 'shortmessage_log';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
