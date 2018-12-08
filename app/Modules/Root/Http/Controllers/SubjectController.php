<?php

namespace App\Modules\Root\Http\Controllers;

use App\Model\Subjects;
use App\Modules\Root\Http\Controllers\RootController;
use Illuminate\Http\Request;

class SubjectController extends RootController
{
    public function index()
    {
        $data = Subjects::all();

        return view('root::subject.index')->with('data', $data);
    }

    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $name = $request->post('name');

            $data = [
                'name' => $name
            ];

            Subjects::addSubject($data);

            return redirect('/root/subject');
        }
        return view('root::subject.add');
    }
}
