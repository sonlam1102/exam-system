<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contests;
use App\Questions;
use App\UserRecord;
use Auth;
use App\Helpers;
use App\UserLog;
use App\Answer;
use App\Result;
use App\Subquestion;

class ContestController extends Controller
{
    public function __construct()
    {
        //Constructor
    }

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

    	$data = Questions::getAllQuestion($id);
        $answer = Answer::select()->where('contest_id', '=', $id)->get();
        $result = Result::select('question_id', 'answer_id')->where('contest_id', '=', $id)->get();
        $record = UserRecord::select('question_id', 'answer_id')
                            ->where('contest_id', '=', $id)
                            ->where('user_id', '=', Auth::user()->id)
                            ->get();
        $took = UserRecord::isTookTheContest(\Auth::user()->id, $id);
        $subquestion = Subquestion::select('question_id')->get();

        if ($record)
            $record = $record->toArray();
        else
            $record = [];

        if ($result)
            $result = $result->toArray();
        else
            $result = [];

        if ($subquestion)
            $subquestion = $subquestion->toArray();
        else
            $subquestion = [];

        $info = Contests::find($id);

        $lasted = UserLog::getLastedLog(\Auth::user()->id, $id);
    	return view('user::contest.exam')
            ->with('data', $data)
            ->with('info', $info)
            ->with('contest_id', $id)
            ->with('lasted', ($lasted) ? $lasted->result : null)
            ->with('answers', $answer)
            ->with('result', $result)
            ->with('record', $record)
            ->with('took', $took)
            ->with('subquestion', $subquestion);
    }

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

        $evaluate = Helpers\Question::evaluateAnswer(\Auth::user()->id, $id);

        $string = (isset($evaluate['right']) && isset($evaluate['total'])) ? $evaluate['right'].'/'.$evaluate['total'] : '';
        UserLog::addUserLog(\Auth::user()->id, $id, $string);
    }
}
