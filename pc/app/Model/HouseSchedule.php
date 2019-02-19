<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HouseSchedule extends Model
{
    protected $table = 'house_schedule';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
