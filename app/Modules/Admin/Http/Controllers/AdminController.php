<?php

namespace App\Modules\Admin\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Helpers\Avatar;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        //Constructor
    }

    public function index()
    {
        if (!Auth::check() || Auth::user()->type != 1) {
            return redirect('/');
        }
        return view('admin::index.index');
    }

    public function admin(Request $request)
    {
        $data = Auth::user();
        return view('admin::account.info')->with('data', $data);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = \Auth::user();

            $isSignOut = false;
            if ($request->password && $request->retype_password && $request->password == $request->retype_password) {
                $isSignOut = $user->changePassword($request->password);
            }

            if (env('USE_IMGUR')) {
                $img_url = Avatar::imageUploadProfile($request, $user);
            }
            else {
                $img_url = Avatar::imgurlUploadProfile($request);
            }

            $data = array(
                'name' => ($request->name) ? $request->name : '',
                'address' => ($request->address) ? $request->address : '',
                'birthday' => ($request->birthday) ? date('Y-m-d', strtotime($request->birthday)) : '',
                'img' => $img_url,
            );

            $check = $user->update_info($data);

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
