<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Feedback;

class FeedBackController extends Controller
{
    public function index()
    {
    	return view('user::feedback.index');
    }

    public function add($id, Request $request)
    {
        $content = $request->post('content');
    	if (!$id)
    		abort('404');

    	$check = Feedback::add($id, $content);

    	if ($check)
    		\Session::flash('success','Feedback sent');

    	return redirect('user/feedback');
    }
}
