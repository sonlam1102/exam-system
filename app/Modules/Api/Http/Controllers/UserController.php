<?php

namespace App\Modules\Api\Http\Controllers;
use Illuminate\Http\Request;


class UserController extends ApiController
{
    public function info(Request $request) {
        if ($request->isMethod('get')) {
            $user_info_data = $this->get_user_info($request);

            return response()->json($user_info_data);
        }

        $name = $request->post('name', null);
        $address = $request->post('address', null);
        $birthday = $request->post('birthday', null);

        $password = $request->post('password', null);
        $retype_password = $request->post('retype_password', null);

        $user = $this->get_user($request); //Current user

        $isSignOut = false;

        $img = $user->img;

        $data = array(
            'name' => $name,
            'address' => $address,
            'birthday' => $birthday,
            'img' => $img,
        );

        $check = $user->update_info($data);

        if ($password && $retype_password && $password == $retype_password ) {
            $isSignOut = $user->changePassword($password);
        }

        $user_info_data = $this->get_user_info($request);   //user data

        if ($isSignOut) {
            $response = [
                'auth' => false,
                'success' => $check,
                'data' => $user_info_data
            ];
            $user->clearApiToken();
        }
        else {
            $response = [
                'auth' => true,
                'success' => $check,
                'data' => $user_info_data
            ];
        }

        return response()->json($response);
    }
}
