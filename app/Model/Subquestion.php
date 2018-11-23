<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subquestion extends Model
{
    protected $table = "subquestion";
    protected $primaryKey = 'question_id';

    public function question() {
        return $this->belongsTo('App\Model\Question', 'question_id');
    }

    public function subquestion() {
        return $this->belongsTo('App\Model\Question', 'subquestion_id');
    }

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

    public static function deleteSubQuestion($question_id)
    {
        return self::where('subquestion_id', '=', $question_id)->delete();
    }

    public static function isBigQuestion($question_id)
    {
        if (!$question_id)
            return false;

        $question = self::find($question_id);
        return ($question) ? true : false;
    }

    public static function isSubQuestion($question_id)
    {
        if (!$question_id)
            return false;

        $question = self::where('subquestion_id', '=', $question_id)->first();
        return ($question) ? true : false;
    }
}
