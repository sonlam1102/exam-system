<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
    protected $table = "contest";

    public function subject() {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

    public function questions() {
        return $this->hasMany('App\Questions', 'contest_id');
    }

    public function answers() {
        return $this->hasMany('App\Answer', 'contest_id');
    }

    public function results() {
        return $this->hasMany('App\Result', 'contest_id');
    }

    public function records() {
        return $this->hasMany('App\UserRecord', 'contest_id');
    }

    public function userslog() {
        return $this->hasMany('App\UserLog', 'contest_id');
    }

    public static function add($data)
    {
    	if (!isset($data['subject_id']) || !isset($data['title']) || !isset($data['date']))
    		return false;
    	if (!$data['subject_id'])
    		return false;

    	$contest = new Contests();

    	$contest->title = trim($data['title']);
    	$contest->date = date('Y-m-d', strtotime($data['date']));
    	$contest->subject_id = $data['subject_id'];
    	$contest->user_id = $data['user_id'];

    	return $contest->save();
    }
    public function edit($data)
    {
        if (!isset($data['subject_id']) || !isset($data['title']) || !isset($data['date']))
            return false;
        if (!$data['subject_id'])
            return false;

        $this->title = $data['title'];
        $this->date = date('Y-m-d', strtotime($data['date']));
        $this->subject_id = $data['subject_id'];

        return $this->save();
    }
}
