<?php

namespace App\Modules\Api\Http\Controllers;

use App\User;
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
            Auth::user()->setApiToken();
            $data = [
                'auth' => true,
                'success' => true,
                'access_token' => Auth::user()->api_token
            ];

        }
        else {
            $data = [
                'auth' => false,
                'success' => false,
            ];
        }
        return response()->json($data);
    }

    public function auth_error() {
        $data = [
            'auth' => false
        ];

        return response()->json($data);
    }

    public function logout(Request $request) {
        $token = $request->header('Token');

        $user = User::getAuthUserByToken($token);

        $user->clearApiToken();

        $data = [
            'auth' => false,
            'success' => true
        ];

        return response()->json($data);
    }

    public function get_user(Request $request) {
        $token = $request->header('Token');

        $user = User::getAuthUserByToken($token);

        return $user;
    }

    public function get_user_info(Request $request) {
        $token = $request->header('Token');

        $user = User::getAuthUserByToken($token);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'birthday' => $user->birthday,
            'img' => $user->img
        ];

        return $data;
    }
}
