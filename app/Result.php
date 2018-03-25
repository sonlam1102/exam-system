<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "result";
    public $timestamps = false;

    public static function checkResultOfQuestion($question_id, $contest_id)
    {
    	if (!$question_id || !$contest_id)
    		return null;

    	$data = self::select()
    				->where('question_id', '=', $question_id)
    				->where('contest_id', '=', $contest_id)
    				->first();
    	return $data;
    }
}
