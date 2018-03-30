<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    public $timestamps = false;

    public static function get_all_answers($questionId)
    {
    	if (!$questionId)
    		return null;

    	$data = self::select()->where('question_id', '=', $questionId)->get();
    	return $data;
    }

    public static function addAnswer($question_id, $constest_id, $content) {
    	if (!$question_id || !$constest_id)
    		return false;

    	$answers = new Answer();
    	$answers->question_id = $question_id;
    	$answers->contest_id = $constest_id;
    	$answers->content = $content;

    	if ($answers->save())
    		return $answers->id;

    	return false;
    }

    public function editAnswer($content)
    {
        $this->content = $content;
        $this->save();
    }
}