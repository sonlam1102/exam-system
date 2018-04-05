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

    public static function getAllUserRecord($user_id, $contest_id)
    {
        if (!$user_id || !$contest_id)
            return null;

        $data = self::select('answer_id')
                    ->where('user_id', '=', $user_id)
                    ->where('contest_id', '=', $contest_id);
        return ($data) ? $data->get() : null;
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

    public static function isTookTheContest($user_id, $contest_id)
    {
        if (!$user_id || !$contest_id)
            return false;

        $data = self::select()
                    ->where('user_id', '=', $user_id)
                    ->where('contest_id', '=', $contest_id);
        return ($data && $data->first()) ? true : false;
    }

    public static function deleteRecordByContest($user_id, $contest_id)
    {
        if (!$user_id || !$contest_id)
            return false;
        $data = self::select()
                    ->where('user_id', '=', $user_id)
                    ->where('contest_id', '=', $contest_id);
        return $data->delete();
    }

    public static function deleteAllRecordByContest($contest_id)
    {
        if (!$contest_id)
            return false;
        $data = self::select()->where('contest_id', '=', $contest_id);
        return $data->delete();
    }
}
