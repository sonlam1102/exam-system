<?php
namespace App\Helpers;
use App\Model\Contests;
use App\Model\Result;
use App\Model\UserRecord;

class Question
{
	public static function checkRightAnswer ($question_id, $records, $results)
	{
        $recordArr = $records->toArray();
        $resultArr = $results->ToArray();
		if (!$question_id || empty($recordArr) || empty($resultArr))
			return -1;

		$data = [];
        $resultData = [];
        foreach ($resultArr as $result) {
            $temp = [
                'question_id' => $result['question_id'],
                'answer_id'=> $result['answer_id']
            ];
            array_push($resultData, $temp);
        }

		foreach ($recordArr as $item) {
			if ($item['question_id'] == $question_id) {
				$data = [
					'question_id' => $item['question_id'],
					'answer_id' => $item['answer_id']
				];
				break;
			}
		}
		
		if (empty($data))
			return -1;

		return (in_array($data, $resultData)) ? 1 : 0;
	}
	
	public static function evaluateAnswer($user_id, $contest_id)
	{
		if (!$user_id || !$contest_id)
			return null;

		$result = Result::getAllResult($contest_id);
		$record = UserRecord::getAllUserRecord($user_id, $contest_id);

		$contest = Contests::find($contest_id);

		if (!$result || !$record)
			return null;

		$total = $contest->total_questions;
		$count = 0;
		
		foreach ($record->toArray() as $item) {
			if (in_array($item, $result->toArray()))
				$count = $count + 1;
		}

		return array(
			'right' => $count,
			'total' => $total,
		);
	}

	public static function checkBox($question_id, $answer_id, $result)
	{
        $resultArr = $result ? $result->toArray() : [];
        $resultData = [];
        foreach ($resultArr as $result) {
            $temp = [
                'question_id' => $result['question_id'],
                'answer_id'=> $result['answer_id']
            ];
            array_push($resultData, $temp);
        }

		if (!$question_id || empty($answer_id) || empty($resultData))
			return '';

		$data = [
			'question_id' => $question_id,
			'answer_id' => $answer_id
		];

		return (in_array($data, $resultData)) ? 'checked' : '';
	}

    public static function isChoseAnswer($question_id, $answer_id, $result)
    {
        $resultArr = $result ? $result->toArray() : [];
        $resultData = [];
        foreach ($resultArr as $result) {
            $temp = [
                'question_id' => $result['question_id'],
                'answer_id'=> $result['answer_id']
            ];
            array_push($resultData, $temp);
        }

        if (!$question_id || empty($answer_id) || empty($resultData))
            return null;

        $data = [
            'question_id' => $question_id,
            'answer_id' => $answer_id
        ];

        return (in_array($data, $resultData)) ? true : false;
    }
}
