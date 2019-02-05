<?php

namespace App\Modules\User\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Helpers\Avatar;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        //Constructor
    }

    public function index() 
    {
    	if(!Auth::check() || Auth::user()->type != 0) {
            return redirect('/');
        }
    	return view('user::index.index');
    }

    public function info(Request $request)
    {
        $data = Auth::user();
        return view('user::account.info')->with('data', $data);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = \Auth::user();
            $isSignOut = false;
            if ($request->password && $request->retype_password && $request->password == $request->retype_password ) {
                $isSignOut = $user->changePassword($request->password);
            }

            if (env('USE_IMGUR')) {
                $img_url = Avatar::imgurlUploadProfile($request);
            }
            else {
                $img_url = Avatar::imageUploadProfile($request, $user);
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
            return redirect('/user/info');
        }
    }
}
