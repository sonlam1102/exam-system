<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
    public function info()
    {
        $data = Auth::user();
        return view('admin::account.info')->with('data', $data);
    }
}
