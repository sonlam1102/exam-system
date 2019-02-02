<?php

namespace App\Modules\User\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Model\Contests;
use App\Model\UserRecord;
use App\Helpers;
use App\Model\UserLog;

class ContestController extends UserController
{
    public function index()
    {
    	$data = Contests::select()->get();
    	return view('user::contest.list')
            ->with('data', $data);
    }

    public function exam($id)
    {
    	if (!$id)
    		abort(404);

    	$contest = Contests::find($id);

    	$question = $contest->questions;
        $took = UserRecord::isTookTheContest(\Auth::user()->id, $id);


        $info = Contests::find($id);

        $lasted = UserLog::getLastedLog(\Auth::user()->id, $id);
    	return view('user::contest.exam')
            ->with('contest', $contest)
            ->with('questions', $question)
            ->with('info', $info)
            ->with('lasted', ($lasted) ? $lasted->result : null)
            ->with('took', $took);
    }

    // Submit bai lam len he thong
    public function submit($id, Request $request)
    {
        $data = isset($request->data) ? $request->data : null;

        if (!$data) {
            return;       
        }

        if (UserRecord::isTookTheContest(Auth::user()->id, $id)) {
            UserRecord::deleteRecordByContest(Auth::user()->id, $id);
        }

        $user_id = Auth::user()->id;
        foreach ($data as $item) {
            $temp = [
                'user_id' => $user_id,
                'contest_id' => $id,
                'question_id' => $item['question_id'],
                'answer_id' => $item['answer_id']
            ];
            UserRecord::addRecord($temp);
        }

        // Danh gia so cau dung
        $evaluate = Helpers\Question::evaluateAnswer(Auth::user()->id, $id);

        // So cau dung trong bai lam
        $string = (isset($evaluate['right']) && isset($evaluate['total'])) ? $evaluate['right'].'/'.$evaluate['total'] : '';
        UserLog::addUserLog(\Auth::user()->id, $id, $string);
    }
}
