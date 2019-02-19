<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberFront extends Model
{
    protected $table = 'member_front';
    protected $primaryKey = 'id';
    protected $dateFormat = 'U';
    protected $guarded = ['id','geetest_challenge','geetest_validate','geetest_seccode'];

    public function Houses()
    {
    	return $this->hasMany('App\Model\House','front_id','id');
    }
}
