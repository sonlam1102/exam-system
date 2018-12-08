<?php

namespace App\Modules\Admin\Http\Controllers;

use App\User;

class UserController extends AdminController
{
    public function index()
    {
    	$mdlUser = new User();
    	$user = $mdlUser->where('type', User::TYPE_USER)->get();

    	return view('admin::account.user')->with('data', $user);
    }

    public function info($id)
    {
        if (!$id)
            abort('404');

        $data = User::find($id);
        $log = $data->logs;
        return view('admin::account.userinfo')  
            ->with('data', $data);
    }
}
