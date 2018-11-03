<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Contests;
use App\Subjects;
use App\Questions;
use App\Result;
use App\Answer;
use App\Subquestion;
use App\UserLog;
use App\UserRecord;

class ContestController extends Controller
{
    //
    public function index()
    {
    	$data = Contests::select()->get();
    	return view('admin::contest.index')->with('data',$data);
    }
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = array(
    			'subject_id' => $request->subject,
    			'title' => $request->title,
    			'date' => $request->date,
                'user_id' => \Auth::user()->id
    		);
    		$check = Contests::add($data);
    		if ($check)
    			return redirect('/admin/contest');

    	}
    	$subject = Subjects::select()->get();

    	return view('admin::contest.add')->with('subject', $subject);
    }
    public function add_question($id, Request $request)
    {
        if (!$id)
            abort('404');
        $data = isset($request->data) ? $request->data : null;
        $update = isset($request->update) ? $request->update : null;

        if ($data) {  
            $mainQuestion = null;
            $subQuestion = null;

            foreach ($data as $item) {
                if (!$item['question'] || $item['question'] == '')
                    continue;
                $questionId = Questions::add_question($id, $item['question']);
                if (!$questionId) {
                    continue;
                }
                if (isset($item['big_question']) && $item['big_question'] == 'true') {
                    if (!isset($item['answer']) || (isset($item['answer']) && empty($item['answer']))) {
                        $mainQuestion = $questionId;
                        continue;
                    }
                    else
                        $subQuestion = $questionId;
                }
                else {
                    $mainQuestion = null;
                    $subQuestion = null;
                }

                if (isset($item['big_question_id']) && $item['big_question_id']) {
                    Subquestion::addSubQuestion($item['big_question_id'], $questionId);
                }

                foreach ($item['answer'] as $value) {
                    $answerId = Answer::addAnswer($questionId, $id, $value['answer_content']);
                    if ($value['right_answer'] != 'true' || !$answerId) {
                        continue;
                    }
                    Result::addResultOfQuestion($questionId, $id, $answerId);
                }
                if ($mainQuestion && $subQuestion)  {
                    Subquestion::addSubQuestion($mainQuestion, $subQuestion);
                }                  
            }
        }

        if ($update) {
            foreach ($update as $item) {
                $question = Questions::find($item['id'])->edit_question($item['question']);
                if (!isset($item['answer']))
                    continue;
                foreach ($item['answer'] as $value) {
                    $answer = Answer::find($value['id'])->editAnswer($value['answer_content']);

                    if ($value['right_answer'] == 'true') {
                        $result = Result::where('question_id', '=', $item['id'])
                                        ->where('contest_id', '=', $id)
                                        ->first();                   
                        ($result) ? $result->editResult($value['id']) : Result::addResultOfQuestion($item['id'], $id, $value['id']);
                    }
                }
            }
        }
    }
    public function edit_info($id, Request $request)
    {
        if (!$id)
            abort('404');

        $subject_id = ($request->subject) ? $request->subject : '';
        $title = ($request->title) ? $request->title : '';
        $date = ($request->startdate) ? $request->startdate : '';

        $data = array(
            'subject_id' => $subject_id,
            'title' => $title,
            'date' => $date,
        );

        $check = Contests::find($id)->edit($data);

        return redirect('admin/contest/edit/'.$id);
    }

    public function edit($id, Request $request)
    {
        if (!$id)
            abort('404');

        $contest = Contests::select()->where('id', '=', $id)->first();
        $subject = Subjects::select()->get();
        if (!$contest)
            abort('404');

        $subquestion = Subquestion::select('question_id')->get();

        if ($subquestion)
            $subquestion = $subquestion->toArray();
        else
            $subquestion = [];

        return view('admin::contest.question')
            ->with('id', $id)
            ->with('data', $contest)->with('subject', $subject)
            ->with('subquestion', $subquestion);
    }

    public function deleteContest($id)
    {
        if (!$id)
            abort('404');

        $contest = Contests::find($id);
        Questions::deleteByContest($id);
        Answer::deleteByContest($id);
        Result::deleteByContest($id);
        UserRecord::deleteAllRecordByContest($id);
        UserLog::deleteAllUserLogByContest($id);
        if ($contest)
            $contest->delete();

        return redirect('admin/contest');
    }

    public function deleteQuestion($id)
    {
        if (!$id)
            abort('404');
        if (Subquestion::isBigQuestion($id)) {
            $subquestion = Subquestion::getAllSubquestion($id);
            foreach ($subquestion as $item) {
                $subQuestion = Questions::find($item->subquestion_id);
                if ($subQuestion)
                    $subQuestion->delete();
                Answer::deleteByQuestion($item->subquestion_id);
                Result::deleteByQuestion($item->subquestion_id);
                UserRecord::deleteRecordByQuestion($item->subquestion_id);
            }
            Subquestion::deleteMainQuestion($id);
            $question = Questions::find($id);
            $question->delete();
        } else {           
            Answer::deleteByQuestion($id);
            Subquestion::deleteSubQuestion($id);
            Result::deleteByQuestion($id);
            UserRecord::deleteRecordByQuestion($id);

            $question = Questions::find($id);
            if ($question)
                $question->delete();
        }   
    }

    public static function listCandidate($id)
    {
        if (!$id)
            abort('404');

        $data = UserLog::getAllLogByContest($id);
        return view('admin::contest.candidate')->with('data', $data);
    }

}
