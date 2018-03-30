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
    	$question->content = $content;

    	if ($question->save())
    		return $question->id;

    	return false;
    }

    public function edit_question($content)
    {
        $this->content = $content;
        $this->save();
    }
    
}
