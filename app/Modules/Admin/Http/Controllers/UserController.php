<?php

namespace App\Modules\Admin\Http\Controllers;

use App\User;

class UserController extends AdminController
{
    public function index()
    {
    	$user = User::getAllUserAccounts();

    	return view('admin::account.user')->with('data', $user);
    }

    public function reset($id) {
        $user = User::find($id);
        if ($user->type == User::TYPE_USER) {
            $user->resetPassword();
        }

        return redirect('/admin/user/list');
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
