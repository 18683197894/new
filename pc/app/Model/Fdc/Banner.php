<?php

namespace App\Model\Fdc;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'fdc_banner';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];}
