<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserLog;

class UserController extends Controller
{
    public function __construct()
    {
        //Constructor
    }
    public function index()
    {
    	$mdlUser = new User();
    	$user = $mdlUser->where('type', 0)->get();

    	return view('admin::account.user')->with('data', $user);
    }

    public function info($id)
    {
        if (!$id)
            abort('404');

        $data = User::find($id);
        $log = UserLog::getAllLogByUser($id);
        return view('admin::account.userinfo')  
            ->with('data', $data)
            ->with('log', $log);
    }
}
