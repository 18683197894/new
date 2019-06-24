<?php

namespace App\Model\Fdc;

use Illuminate\Database\Eloquent\Model;

class FrontKeyword extends Model
{
    protected $table = 'fdc_frontkeyword';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
