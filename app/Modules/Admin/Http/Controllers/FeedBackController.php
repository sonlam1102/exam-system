<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Feedback;

class FeedBackController extends Controller
{
    public function index()
    {
    	$data = Feedback::getAllFeedback();

    	return view('admin::feedback.index')->with('data', $data);
    }
}
