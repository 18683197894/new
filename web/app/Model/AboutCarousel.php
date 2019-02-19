<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutCarousel extends Model
{
    protected $table = 'about_carousel';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
