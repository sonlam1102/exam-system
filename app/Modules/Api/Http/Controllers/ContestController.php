<?php

namespace App\Modules\Api\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Contests;
use App\Model\UserRecord;
use App\Helpers;
use App\Model\UserLog;

class ContestController extends ApiController
{
    // CHi tiet de thi
    public function index(Request $request, $id) {
        $user = $this->get_user($request);
        $user_info_data = $this->get_user_info($request);

        $contest = Contests::find($id);
        $took = UserRecord::isTookTheContest($user->id, $contest->id);

        $data['user'] = $user_info_data;

        $data['contest'] = [
            'id' => $contest->id,
            'name' => $contest->title,
            'date' => $contest->date,
            'question' => $contest->questions->count(),
            'is_took' => $took,
            'result' => $contest->get_user_log($user->id),
            'subject' => $contest->subject->name,
            'grade' => $contest->grade
        ];

        $questions = [];
        foreach ($contest->questions as $item) {
            $temp = [
                'id' => $item->id,
                'content' => $item->content,
                'img' => $item->img,
            ];
            if ($item->isBigQuestion($item->id)) {
                $temp['big_question'] = true;

                $sq = "";
                foreach($item->subquestions as $bq) {
                    $sq = $sq.$bq->id." ";
                }
                $temp['sub_questions'] = $sq;
            }
            elseif ($item->isSubQuestion($item->id)) {
                $temp['parent_question'] = $item->parent_question_id;
            }
            if ($took and !$item->isBigQuestion()) {
                $check = \App\Helpers\Question::checkRightAnswer($item->id, $contest->records->where('user_id', '=', $user->id), $contest->results);
                if ($check === 1) {
                    $temp['result'] = true;
                }
                elseif ($check === 0) {
                    $temp['result'] = false;
                }
                else {
                    $temp['result'] = null;
                }
            }
            $answers = [];
            foreach ($item->answers as $ans) {
                $ans_item = [
                    'id' => $ans->id,
                    'content' => $ans->content,
                    'img' => $ans->img,
                ];
                if ($took) {
                    $is_chose = \App\Helpers\Question::isChoseAnswer($item->id, $ans->id, $contest->records->where('user_id', '=', $user->id));
                    $ans_item['chose'] = $is_chose;
                }
                array_push($answers, $ans_item);
            }
            $temp['answers'] = $answers;
            array_push($questions, $temp);
        }
        $data['questions'] = $questions;

        return response()->json($data);
    }

    public function submit(Request $request, $id) {
        $user = $this->get_user($request);   //User info

        $data = isset($request->data) ? $request->data : null;

        if (!$data) {
            return;
        }

        $user_id = $user->id;

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
        $evaluate = Helpers\Question::evaluateAnswer($user_id, $id);

        // So cau dung trong bai lam
        $string = (isset($evaluate['right']) && isset($evaluate['total'])) ? $evaluate['right'].'/'.$evaluate['total'] : '';
        UserLog::addUserLog($user_id, $id, $string);
    }
}
