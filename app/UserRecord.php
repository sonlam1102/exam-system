<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{
    protected $table = "user_record";
    protected $primaryKey = 'user_id';
}
