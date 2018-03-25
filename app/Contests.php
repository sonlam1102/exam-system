<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
    protected $table = "contest";
    public $timestamps = false;
    public static function add($data)
    {
    	if (!isset($data['subject_id']) || !isset($data['title']) || !isset($data['date']))
    		return false;
    	if (!$data['subject_id'])
    		return false;

    	$contest = new Contests();

    	$contest->title = $data['title'];
    	$contest->date = date('Y-m-d', strtotime($data['date']));
    	$contest->subject_id = $data['subject_id'];

    	return $contest->save();
    }
    public static function edit($id, $data)
    {
        if (!isset($data['subject_id']) || !isset($data['title']) || !isset($data['date']))
            return false;
        if (!$data['subject_id'])
            return false;

        $contest = self::find($id);
        if (!$contest)
            return false;

        $contest->title = $data['title'];
        $contest->date = date('Y-m-d', strtotime($data['date']));
        $contest->subject_id = $data['subject_id'];

        return $contest->save();
    }
}
