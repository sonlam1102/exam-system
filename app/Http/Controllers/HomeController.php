<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == User::TYPE_USER) {
            return redirect('/user/home');
        }
        elseif (\Auth::user()->type == User::TYPE_ADMIN) {
            return redirect('/admin/home');
        }
        elseif (\Auth::user()->type == User::TYPE_ROOT) {
            return redirect('/root/home');
        }
    }
    public function login(Request $request)
    {
        $error = "";

        if(\Auth::check())
        	return redirect('/');
        if($request->isMethod('post')) {
            $rules = [
                'email' =>'required|email',
                'password' => 'required|min:4'
            ];
            $messages = [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 4s ký tự',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $error = "Email và mật khẩu không chính xác";
            } else {
                $email = $request->input('email');
                $password = $request->input('password');

                if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                    return redirect()->intended('/');
                } else {
                    $error = "Email và mật khẩu không chính xác";
                }
            }
        }
        return view('auth.login')->with('error', $error);
    }
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'email' =>'required|email',
                'password' => 'required|min:4'
            ];
            $messages = [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 4s ký tự',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('/register')->withErrors($validator)->withInput();
            }
            $data = $request->all();

            $error = "";
            try {
                \App\User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
            } catch (\Exception $e) {
                $error = "Đăng ký không thành công. Vui lòng kiểm tra lại email và mật khẩu";
            }
            if ($error === "") {
                return view('auth.login');
            }
            else {
                return view('auth.register')->with('error', $error);
            }
        }
        return view('auth.register')->with('error', "");
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
