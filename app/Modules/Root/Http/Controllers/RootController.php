<?php

namespace App\Modules\Root\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;

class RootController extends Controller
{
    public function __construct()
    {
        //Constructor
    }
    public function index()
    {
        return view('root::index.index');
    }

    public function account(Request $request)
    {
        $data = Auth::user();
        return view('root::account.info')->with('data', $data);
    }
}
