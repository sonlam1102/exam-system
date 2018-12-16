<?php

namespace App\Modules\Api\Http\Controllers;

use App\Model\Contests;
use App\Model\Questions;
use App\Model\Subquestion;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ContestController extends ApiController
{
    public function index(Request $request, $id) {
        $user = $this->get_user($request);
        $user_info_data = $this->get_user_info($request);

        $contest = Contests::find($id);

        $data['user'] = $user_info_data;

        $data['contest'] = [
            'id' => $contest->id,
            'name' => $contest->title,
            'date' => $contest->date,
            'question' => $contest->questions->count(),
        ];

        $questions = [];
        foreach ($contest->questions as $item) {
            $temp = [
                'id' => $item->id,
                'content' => $item->content
            ];
            if (Subquestion::isBigQuestion($item->id)) {
                $temp['big_question'] = true;
            }
            elseif (Subquestion::isSubQuestion($item->id)) {
                $temp['parent_question'] = $item->questionparent->question->id;
            }
            $answers = [];
            foreach ($item->answers as $ans) {
                $ans_item = [
                    'id' => $ans->id,
                    'content' => $ans->content
                ];
                array_push($answers, $ans_item);
            }
            $temp['answers'] = $answers;
            array_push($questions, $temp);
        }
        $data['questions'] = $questions;

        return response()->json($data);
    }
}
