<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = "subjects";

    public static function getName($id) 
    {
    	$subject = self::find($id);

    	return ($subject) ? $subject->name : null;
    }

    public static function addSubject($data) {
        $subject = new Subjects();
        $subject->name = $data['name'];
        return $subject->save();
    }
}
