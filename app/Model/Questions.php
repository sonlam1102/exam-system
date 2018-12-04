<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = "question";

    public function subquestions() {
        return $this->hasMany('App\Model\Subquestion', 'question_id');
    }

    public function questionparent() {
        return $this->hasOne('App\Model\Subquestion', 'subquestion_id');
    }

    public function answers() {
        return $this->hasMany('App\Model\Answer', 'question_id');
    }

    public function result() {
        return $this->hasOne('App\Model\Result', 'question_id');
    }

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