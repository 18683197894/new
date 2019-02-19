<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MemberBackend extends Model
{
    //
    protected $table = 'member_backend';
    protected $primaryKey = 'id';
    protected $dateFormat = 'U';
    protected $guarded = ['id','geetest_challenge','geetest_validate','geetest_seccode'];

    public function Roles()
    {
    	return $this->hasOne('App\Model\Role','id','role_id');
    }

}
