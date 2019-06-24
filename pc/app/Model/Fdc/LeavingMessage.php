<?php

namespace App\Model\Fdc;

use Illuminate\Database\Eloquent\Model;

class LeavingMessage extends Model
{
    protected $table = 'fdc_leaving_message';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
