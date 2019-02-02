<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = "question";

    public function contest() {
        return $this->belongsTo('App\Model\Contest', 'contest_id');
    }

    public function subquestions() {
        return $this->hasMany('App\Model\Questions', 'parent_question_id');
    }

    public function answers() {
        return $this->hasMany('App\Model\Answer', 'question_id');
    }

    public function result() {
        return $this->hasOne('App\Model\Result', 'question_id');
    }

    public function isBigQuestion()
    {
        if($this->subquestions->isEmpty()) {
            return false;
        }

        return true;
    }

    public function isSubQuestion() {
        if ($this->parent_question_id) {
            return true;
        }
        return false;
    }

    public function addSubQuestion($parent) {
        $this->parent_question_id = $parent;
        $this->save();
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
        if ($this->isBigQuestion()) {
            foreach ($this->subquestions as $item) {
                foreach ($item->answers as $ans) {
                    $ans->delete();
                }
                $item->delete();
            }
        }
        else {
            foreach ($this->answers as $ans) {
                $ans->delete();
            }
        }

        return $this->delete();   
    }

    public function changeImage($img_link) {
        $this->img = $img_link;
        return $this->save();
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
