<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subquestion extends Model
{
    protected $table = "subquestion";
    protected $primaryKey = 'question_id';

    public $timestamps = false;

    public static function addSubQuestion($question_id, $subquestion_id)
    {
    	if (!$question_id || !$subquestion_id)
    		return false;

    	$subquestion = new Subquestion();
    	$subquestion->question_id = $question_id;
    	$subquestion->subquestion_id = $subquestion_id;

    	return $subquestion->save();
    }

    public static function getAllSubquestion($question_id)
    {
    	$data = self::select('subquestion_id')->where('question_id', '=', $question_id);
    	return ($data) ? $data->get() : null;
    }	

    public static function deleteMainQuestion($question_id)
    {
        return self::where('question_id', '=', $question_id)->delete();
    }
}
