<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
}
