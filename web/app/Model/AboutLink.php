<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutLink extends Model
{
    protected $table = 'about_link';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
