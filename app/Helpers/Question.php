<?php
namespace App\Helpers;
use App\Result;
use App\UserRecord;

class Question
{
	public static function isRightAnswer ($userAnswerId, $questionId, $contest_id)
	{
		if (!$userAnswerId || !$questionId || !$contest_id)
			return '';

		$resultAnswer = Result::checkResultOfQuestion($questionId, $contest_id);

		if (!$resultAnswer)
			return '';

		return ($userAnswerId == (int)$resultAnswer->answer_id) ? 'green-border' : '';
	}
}
