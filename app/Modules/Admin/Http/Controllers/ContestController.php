<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Contests;
use App\Model\Subjects;
use App\Model\Questions;
use App\Model\Result;
use App\Model\Answer;
use App\Model\UserLog;
use App\Model\UserRecord;

use App\Helpers\Upload;


class ContestController extends AdminController
{
    //
    public function index()
    {
    	$data = Contests::select()->paginate(10);
    	return view('admin::contest.index')->with('data', $data);
    }
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = array(
    			'subject_id' => $request->subject,
    			'title' => $request->title,
    			'date' => $request->date,
                'user_id' => \Auth::user()->id,
                'grade' => $request->grade
    		);
    		$check = Contests::add($data);
    		if ($check)
    			return redirect('/admin/contest/edit/'.$check);

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
            foreach ($data as $item) {
                if (!$item['question'] || $item['question'] == '')
                    continue;

                $questionId = Questions::add_question($id, $item['question']);
                $question = Questions::find($questionId);

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

                foreach ($item['answer'] as $value) {
                    $answerId = Answer::addAnswer($questionId, $id, $value['answer_content']);
                    if ($value['right_answer'] != 'true' || !$answerId) {
                        continue;
                    }
                    Result::addResultOfQuestion($questionId, $id, $answerId);
                }
                if ($mainQuestion && $subQuestion)  {
                    $question->addSubQuestion($mainQuestion);
                }

                if (isset($item['big_question_id']) && $item['big_question_id']) {
                    $question->addSubQuestion($item['big_question_id']);
                }
            }
        }

        if ($update) {
            foreach ($update as $item) {
                $question = Questions::find($item['id']);

                $question->content = $item['question'];
                $question->save();

                if (!isset($item['answer']))
                    continue;
                foreach ($item['answer'] as $value) {
                    $answer = Answer::find($value['id']);
                    $answer->content = $value['answer_content'];
                    $answer->save();

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
        $is_show = $request->is_show ? true : false;
        $grade = ($request->grade) ? $request->grade : null;

        $data = array(
            'subject_id' => $subject_id,
            'title' => $title,
            'date' => $date,
            'is_show' => $is_show,
            'grade' => $grade
        );

        $check = Contests::find($id)->edit($data);

        return redirect('admin/contest/edit/'.$id);
    }

    public function edit($id, Request $request)
    {
        if (!$id)
            abort('404');

        $contest = Contests::find($id);
        $subject = Subjects::select()->get();
        $questions = $contest->questions();

        if (!$contest)
            abort('404');

        $questions = $questions->paginate(5);
        $grade = $contest->grade;

        return view('admin::contest.question')
            ->with('id', $id)
            ->with('data', $contest)
            ->with('subject', $subject)
            ->with('questions', $questions)
            ->with('grade', $grade);
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

        $question = Questions::find($id);
        $question->deleteQuestion();
    }

    public static function listCandidate($id)
    {
        if (!$id)
            abort('404');

        $data = Contests::find($id);
        $user_log = $data->userslog;
        return view('admin::contest.candidate')->with('data', $user_log);
    }

    public function uploadQuestionImage(Request $request, $id) {
        $question = Questions::find($id);

        if (!$question)
            abort('404');

        if (env('USE_IMGUR')) {
            $question_img = Upload::questionImgurUpload($request);
        }
        else {
            $question_img = Upload::questionImageUpload($request, $question);
        }

        $question->changeImage($question_img);

    }

    public function uploadAnswerImage(Request $request, $id) {
        $answer = Answer::find($id);

        if (!$answer)
            abort('404');

        if (env('USE_IMGUR')) {
            $answer_img = Upload::answerImgurUpload($request);
        }
        else {
            $answer_img = Upload::answerImageUpload($request, $answer);
        }

        $answer->changeImage($answer_img);

    }
}
