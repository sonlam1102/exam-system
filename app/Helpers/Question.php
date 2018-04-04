<?php
namespace App\Helpers;
use App\Result;
use App\UserRecord;

class Question
{
	public static function checkRightAnswer ($userId, $questionId, $contest_id)
	{
		if (!$userId || !$questionId || !$contest_id)
			return -1;

		$resultAnswer = Result::checkResultOfQuestion($questionId, $contest_id);
		$userAnswer = UserRecord::getAnswer($userId, $contest_id, $questionId);
		if (!$resultAnswer)
			return -1;

		if (!$userAnswer)
			return 0;

		return ((int)$userAnswer->answer_id == (int)$resultAnswer->answer_id) ? 1 : 0;
	}
	
	public static function evaluateAnswer($user_id, $contest_id)
	{
		if (!$user_id || !$contest_id)
			return null;

		$result = Result::getAllResult($contest_id);
		$record = UserRecord::getAllUserRecord($user_id, $contest_id);

		$total = $result->count();
		
		foreach ($record as $item) {
			
		}
	}
}
