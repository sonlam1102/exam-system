<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Model\Feedback;

class FeedBackController extends AdminController
{
    public function index()
    {
    	$data = Feedback::getAllFeedback();

    	return view('admin::feedback.index')->with('data', $data);
    }
}
