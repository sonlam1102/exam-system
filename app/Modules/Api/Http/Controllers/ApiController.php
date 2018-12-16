<?php

namespace App\Modules\Api\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function login(Request $request) {
        $email = $request->post('email', null);
        $password = $request->post('password', null);

        $credential = [
            'email'=> $email,
            'password' => $password
        ];


        if (Auth::attempt($credential)) {
            $data = [
                'success' => true,
                'access_token' => Auth::user()->remember_token
            ];
        }
        else {
            $data = [
                'success' => false
            ];
        }
        return response()->json($data);
    }

    public function index() {
        dd('1');
    }
}
