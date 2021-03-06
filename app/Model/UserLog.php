<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = "user_log";
    protected $primaryKey = 'user_id';

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function contest() {
        return $this->belongsTo('App\Model\Contests', 'contest_id');
    }

    public static function addUserLog($user_id, $contest_id, $result)
    {
    	if (!$user_id || !$contest_id)
    		return false;

    	$userLog = new UserLog();

    	$userLog->user_id = $user_id;
    	$userLog->contest_id = $contest_id;
    	$userLog->result = $result;
    	$userLog->date = date('Y-m-d');

    	return $userLog->save();
    }

    public static function getLastedLog($user_id, $contest_id)
    {
    	if (!$user_id || !$contest_id)
    		return null;

    	$data = self::select()
                    ->where('user_id', '=', $user_id)
                    ->where('contest_id', '=', $contest_id)
                    ->orderBy('date', 'desc');

    	return ($data) ? $data->first() : null;
    }

    public static function getAllLogByContest($contest_id)
    {
        if (!$contest_id)
            return null;

        $data = self::select()->where('contest_id', '=', $contest_id);

        return ($data) ? $data->get() : null;
    }

    public static function getAllLogByUser($user_id)
    {
        if (!$user_id)
            return null;

        $data = self::select()->where('user_id', '=', $user_id);

        return ($data) ? $data->get() : null;
    }

    public static function deleteAllUserLogByContest($contest_id)
    {
        if (!$contest_id)
            return null;
        
        $data = self::select()->where('contest_id', '=', $contest_id);

        return $data->delete();
    }
}
