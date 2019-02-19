<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleRule extends Model
{
    protected $table = 'role_rule';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
