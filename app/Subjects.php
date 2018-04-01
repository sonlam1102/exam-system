<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = "subjects";

    public static function getName($id) 
    {
    	$subject = self::find($id);

    	return ($subject) ? $subject->name : null;
    }
}
