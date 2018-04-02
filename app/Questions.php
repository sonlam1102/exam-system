<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = "questions";
    public $timestamps = false;
    
    public static function add_question($contest_id, $content) {
    	if (!$contest_id)
    		return false;

    	$question = new Questions();
    	$question->contest_id = $contest_id;
    	$question->content = trim($content);

    	if ($question->save())
    		return $question->id;

    	return false;
    }

    public function edit_question($content)
    {
        $this->content = trim($content);
        return $this->save();
    }

    public static function countQuestionByContest($contest_id)
    {
        $question = self::select()->where('contest_id', '=', $contest_id);
        return $question->count();
    }

    public function deleteQuestion()
    {
        return $this->delete();   
    }

    public static function deleteByContest($contest_id)
    {
        return self::where('contest_id', '=', $contest_id)->delete();
    }

    public static function getAllQuestion($contest_id)
    {
        if (!$contest_id)
            return null;

        $data = self::select()->where('contest_id', '=', $contest_id);
        return ($data) ? $data->get() : null;
    }
}
