<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    public $timestamps = false;

    public function get_all_answers($questionId)
    {
    	if (!$questionId)
    		return null;

    	$data = Answer::select()->where('question_id', '=', $questionId)->get();
    	return $data;
    }
}
