<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeavingMessage extends Model
{
    protected $table = 'leaving_message';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
