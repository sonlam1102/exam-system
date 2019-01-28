<?php

namespace App\Modules\Api\Http\Controllers;

use App\Model\Contests;
use App\Model\UserRecord;
use App\Model\Subquestion;
use Illuminate\Http\Request;

/**
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="This is my website cool API",
 *         description="Api description...",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="contact@mysite.com"
 *         ),
 *         @SWG\License(
 *             name="Private License",
 *             url="URL to the license"
 *         )
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="Find out more about my website",
 *         url="http..."
 *     )
 * )
 */
class ContestController extends ApiController
{
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
        ];

        if ($took) {
            $data['contest']['is_took'] = $took;
        }

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
            if ($took and !Subquestion::isBigQuestion($item->id)) {
                $check = \App\Helpers\Question::checkRightAnswer($item->id, $contest->records->where('user_id', '=', $user->id), $contest->results);
                if ($check === 1) {
                    $temp['result'] = true;
                }
                else {
                    $temp['result'] = false;
                }
            }
            $answers = [];
            foreach ($item->answers as $ans) {
                $ans_item = [
                    'id' => $ans->id,
                    'content' => $ans->content
                ];
                if ($took) {
                    if ($ans->question->result->answer_id == $ans->id) {
                        $ans_item['chose'] = true;
                    }
                    else {
                        $ans_item['chose'] = false;
                    }
                }
                array_push($answers, $ans_item);
            }
            $temp['answers'] = $answers;
            array_push($questions, $temp);
        }
        $data['questions'] = $questions;

        return response()->json($data);
    }
}
