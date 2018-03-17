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
            return redirect('/');
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

            if ($request->password && $request->retype_password && $request->password == $request->retype_password ) {
                $user->password = bcrypt($request->password);
                $user->save();
            }
            $data = array(
                'name' => ($request->name) ? $request->name : '',
                'address' => ($request->address) ? $request->address : '',
                'birthday' => ($request->birthday) ? $request->birthday : '',
                'img' => ($request->img) ? $request->img : '',
            );
            $check = User::update_info($id, $data);
            if (!$check)
                $message = 'Update was failed';
            else
                $message = 'Update was successfully';

            \Session::flash('error', $message);
            return redirect('/admin/info');
        }
    }
    public function user_account(Request $request)
    {
        return view('admin::account.user');
    }
}
