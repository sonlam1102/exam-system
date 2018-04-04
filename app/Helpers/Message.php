<?php 
namespace App\Helpers;

class Message 
{
	public static function getNotify ($type = 0)
	{
		$message = '';
		if ($type === 0) {
			$message = "<span class='label label-success'>OK</span>";
		}

		if ($type == 1) {
			$message = "<span class='label label-warning'>No Answer</span>";
		}

		if ($type == 2) {
			$message = "<span class='label label-danger'>Wrong</span>";
		}

		return $message;
	}
}