<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutMember extends Model
{
    protected $table = 'about_member';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
