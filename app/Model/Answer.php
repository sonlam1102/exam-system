<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answer";

    public function contest() {
        return $this->belongsTo('App\Model\Contest', 'contest_id');
    }

    public function question() {
        return $this->belongsTo('App\Model\Questions', 'question_id');
    }

    public static function addAnswer($question_id, $constest_id, $content) {
    	if (!$question_id || !$constest_id)
    		return false;
        if (!$content || $content == '')
            return false;

    	$answers = new Answer();
    	$answers->question_id = $question_id;
    	$answers->contest_id = $constest_id;
    	$answers->content = trim($content);

    	if ($answers->save())
    		return $answers->id;

    	return false;
    }

    public function editAnswer($content)
    {
        $this->content = trim($content);
        return $this->save();
    }

    public function deleteAnswer()
    {
        return $this->delete();
    }

    public static function deleteByQuestion($question_id)
    {
        return self::where('question_id', '=', $question_id)->delete();
    }

    public static function deleteByContest($contest_id)
    {
        return self::where('contest_id', '=', $contest_id)->delete();
    }
}
