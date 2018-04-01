<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UserController extends Controller
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
    	return view('user::index.index');
    }
}
