<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedBackController extends Controller
{
    public function index()
    {
    	return view('user::feedback.index');
    }

    public function add($id, Request $request)
    {
//    	if (!$id)
//    		abort('404');
//
//    	$content = ($request->content) ? $request->content : null;
//    	$check = Feedback::add($id, $content);
//
//    	if ($check)
//    		\Session::flash('success','Feedback sent');
//
//    	return redirect('user/feedback');
    }
}
