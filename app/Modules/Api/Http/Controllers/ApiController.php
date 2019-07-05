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


        if (Auth::attempt($credential) && Auth::user()->type == User::TYPE_USER) {
            Auth::user()->setApiToken();
            $data = [
                'auth' => true,
                'success' => true,
                'access_token' => Auth::user()->api_token
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                'auth' => false,
                'success' => false,
            ];
            return response()->json($data, 400);
        }

    }

    public function auth_error() {
        $data = [
            'auth' => false
        ];

        return response()->json($data, 400);
    }

    public function logout(Request $request) {
        $token = $request->header('Token');

        $user = User::getAuthUserByToken($token);

        if (!$user) {
            $data = [
                'success' => false
            ];
            return response()->json($data, 400);
        }

        $user->clearApiToken();

        $data = [
            'success' => true
        ];

        return response()->json($data, 200);
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

    public function register_user(Request $request) {
        $email = $request->post('email', null);
        $name = $request->post('name', null);
        $password = $request->post('password', null);
        $retype_password = $request->post('retype_password', null);

        if ($password !== $retype_password) {
            return response()->json(['error' => 'Mật khẩu không chính xác'], 400);
        }

        try {
            \App\User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
            return response()->json(['error' => 'Thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đăng ký không thành công. Vui lòng kiểm tra lại email và mật khẩu'], 400);
        }
    }
}
