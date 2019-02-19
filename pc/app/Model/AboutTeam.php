<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutTeam extends Model
{
    protected $table = 'about_team';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function Members()
    {
        return $this->hasMany('App\Model\AboutMember','team_id','id');
    }
}
