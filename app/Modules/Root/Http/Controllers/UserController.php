<?php

namespace App\Modules\Root\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UserController extends RootController
{
    public function index()
    {
        $mdlUser = new User();
        $user = $mdlUser->where('type', User::TYPE_ADMIN)->get();

        return view('root::account.user')->with('data', $user);
    }

    public function info($id)
    {
        if (!$id)
            abort('404');

        $data = User::find($id);
        $log = $data->logs;
        return view('root::account.userinfo')
            ->with('data', $data);
    }

    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $name = $request->post('name');
            $email = $request->post('email');

            User::add_admin($email, $name);

            return redirect('/root/user/list');
        }

        return view('root::account.add');
    }
}
