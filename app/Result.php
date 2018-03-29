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

    	$data = self::select('answer_id')
    				->where('question_id', '=', $question_id)
    				->where('contest_id', '=', $contest_id)
    				->first();
    	return $data;
    }

    public static function addResultOfQuestion($question_id, $contest_id, $answer_id) {
        if (!$question_id || !$contest_id || !$answer_id)
            return false;

        $result = new Result();
        $result->question_id = $question_id;
        $result->contest_id = $contest_id;
        $result->answer_id = $answer_id;

        return $result->save();
    }
}
