<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contests;
use App\Questions;

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

    	return view('user::contest.exam')->with('data', $data);
    }
}
