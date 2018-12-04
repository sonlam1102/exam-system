<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "result";
    protected $primaryKey = 'question_id';

    public function question() {
        return $this->belongsTo('App\Model\Questions', 'question_id');
    }

    public function answer() {
        return $this->belongsTo('App\Model\Answer', 'answer_id');
    }

    public function contest() {
        return $this->belongsTo('App\Model\Contests', 'contest_id');
    }

    public static function getAllResult($contest_id)
    {
        if (!$contest_id)
            return null;
        $data = self::select('answer_id')->where('contest_id', '=', $contest_id);

        return ($data) ? $data->get() : null;
    }

    public static function addResultOfQuestion($question_id, $contest_id, $answer_id) 
    {
        if (!$question_id || !$contest_id || !$answer_id)
            return false;

        $result = new Result();
        $result->question_id = $question_id;
        $result->contest_id = $contest_id;
        $result->answer_id = $answer_id;

        return $result->save();
    }

    public function editResult($newAnswerId) 
    {
        $this->answer_id = $newAnswerId;
        return $this->save();
    }

    public static function deleteByQuestion($questionId)
    {
        if (!$questionId)
            return false;

        return self::where('question_id', '=', $questionId)->delete();
    }

    public static function deleteByContest($contest_id)
    {
        if (!$contest_id)
            return false;
        
        return self::where('contest_id', '=', $contest_id)->delete();
    }
}
