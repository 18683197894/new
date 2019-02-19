<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileUploadsInfo extends Model
{
    protected $table = 'file_uploads_info';
    protected $dateFormat = 'U';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
