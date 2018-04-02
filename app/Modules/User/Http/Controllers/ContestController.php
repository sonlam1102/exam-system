<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contests;
use App\Questions;
use App\UserRecord;
use Auth;

class ContestController extends Controller
{
    public function __construct()
    {
        //Constructor
    }

    public function index()
    {
    	$data = Contests::select()->get();
    	return view('user::contest.list')->with('data', $data);
    }

    public function exam($id)
    {
    	if (!$id)
    		abort(404);

    	$data = Questions::getAllQuestion($id);
        $info = Contests::find($id);
    	return view('user::contest.exam')
            ->with('data', $data)
            ->with('info', $info)
            ->with('contest_id', $id);
    }

    public function submit($id, Request $request)
    {
        $data = isset($request->data) ? $request->data : null;

        if ($data) {
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
        }
    }
}
