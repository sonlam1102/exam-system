<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Contests;
use App\Subjects;
use App\Questions;

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

        $question = Questions::select()->where('contest_id', '=', $id)->get();
        return view('admin::contest.question')
            ->with('id', $id)
            ->with('data', $contest)->with('subject', $subject)
            ->with('questions', $question);
    }
    public function edit_info($id, Request $request)
    {
        if (!$id)
            abort('404');
        $subject_id = ($request->subject) ? $request->subject : '';
        $title = ($request->title) ? $request->title : '';
        $date = ($request->startdate) ? $request->startdate : '';

        $data = array(
            'subject_id' => $subject_id,
            'title' => $title,
            'date' => $date,
        );

        $check = Contests::edit($id, $data);

        return redirect('admin/contest/edit/'.$id);
    }
}
