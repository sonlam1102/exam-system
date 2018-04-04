<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = "user_log";
    protected $primaryKey = 'user_id';

    public $timestamps = false;

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
}
