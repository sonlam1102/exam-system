<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Carbon\Carbon; 

class AdminController extends Controller
{
    public function __construct()
    {
        //Constructor
    }
    public function index()
    {
    	if(!Auth::check()) {
            return redirect('/login');
        }
    	return view('admin::index.index');
    }
    public function info(Request $request)
    {
        $data = Auth::user();
        return view('admin::account.info')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $user = \Auth::user();
            $isSignOut = false;
            if ($request->password && $request->retype_password && $request->password == $request->retype_password ) {
                $user->password = bcrypt($request->password);
                $user->save();
                $isSignOut = true;
            }
            $data = array(
                'name' => ($request->name) ? $request->name : '',
                'address' => ($request->address) ? $request->address : '',
                'birthday' => ($request->birthday) ? date('Y-m-d', strtotime($request->birthday)) : '',
                'img' => ($request->img) ? $request->img : '',
            );
            $check = User::find($id)->update_info($data);
            if (!$check)
                $message = 'Update was failed';
            else
                $message = 'Update was successfully';

            \Session::flash('error', $message);
            if ($isSignOut) {
                Auth::logout();
                return redirect('/');
            }
            return redirect('/admin/info');
        }
    }
}
