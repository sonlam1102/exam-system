<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Contests;
use App\Subjects;

class ContestController extends Controller
{
    //
    public function index()
    {
    	$data = Contests::select()->get();
    	return view('admin::contest.index')->with('data',$data);
    }
    public function add(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = array(
    			'subject_id' => $request->subject,
    			'title' => $request->title,
    			'date' => $request->date,
    		);
    		$check = Contests::add($data);
    		if ($check)
    			return redirect('/admin/contest');

    	}
    	$subject = Subjects::select()->get();

    	return view('admin::contest.add')->with('subject', $subject);
    }
    public function add_question($id, Request $request)
    {
        if (!$id)
            abort('404');

        $contest = Contests::select()->where('id', '=', $id)->first();
        $subject = Subjects::select()->get();
        if (!$contest)
            abort('404');

        return view('admin::contest.question')->with('data', $contest)->with('subject', $subject);
    }
}
