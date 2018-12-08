<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Model\Subjects;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SubjectController extends AdminController
{
    public function index()
    {
        $data = Subjects::all();

        return view('admin::subject.index')->with('data', $data);
    }

    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $name = $request->post('name');

            $data = [
                'name' => $name
            ];

            Subjects::addSubject($data);

            return redirect('/admin/subject');
        }
        return view('admin::subject.add');
    }
}
