<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "feedback";

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public static function getAllFeedback()
    {
    	$data = self::select();

    	return ($data) ? $data->get() : null;
    }

    public static function add($user_id, $content)
    {
    	if (!$user_id)
    		return false;

    	$feedback = new Feedback();
    	$feedback->user_id = $user_id;
    	$feedback->content = $content;

    	return $feedback->save();
    }
}
