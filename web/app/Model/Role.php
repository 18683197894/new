<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function rules()
    {
    	return $this->belongsToMany('App\Model\Rule', 'role_rule','role_id', 'rule_id');
    }

}
