<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = "user_log";
    protected $primaryKey = 'user_id';

    public $timestamps = false;
}
