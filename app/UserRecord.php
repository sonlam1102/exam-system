<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{
    protected $table = "user_record";
    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public static function addRecord($data)
    {
    	if (!isset($data['user_id']) || !isset($data['contest_id']) || !isset($data['question_id']) || !isset($data['answer_id']))
    		return false;
    	if (!$data['user_id'] || !$data['contest_id'] || !$data['question_id'] || !$data['answer_id'])
    		return false;

    	$userRecord = new UserRecord();
    	$userRecord->user_id = $data['user_id'];
    	$userRecord->contest_id = $data['contest_id'];
    	$userRecord->question_id = $data['question_id'];
    	$userRecord->answer_id = $data['answer_id'];

    	return $userRecord->save();
    }

    public static function getAnswer($user_id, $contest_id, $question_id)
    {
    	if (!$user_id || !$contest_id || !$question_id)
    		return null;

    	$data = self::select('answer_id')
    				->where('user_id', '=', $user_id)
    				->where('contest_id', '=', $contest_id)
    				->where('question_id', '=', $question_id);

    	return ($data) ? $data->first() : null;
    }
}
