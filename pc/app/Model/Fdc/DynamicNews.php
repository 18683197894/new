<?php

namespace App\Model\Fdc;

use Illuminate\Database\Eloquent\Model;

class DynamicNews extends Model
{
    protected $table = 'fdc_dynamic_news';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
