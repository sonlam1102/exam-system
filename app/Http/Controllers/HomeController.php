<?php

namespace App\Http\Controllers;

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
        if(!\Auth::check()){
            return view('auth.login');
        }
        else {
            if (\Auth::user()->type == 0) {
                dd('user');
            }
            else {
                return redirect('/admin/home');
            }
        }
    }
    public function login(Request $request)
    {
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
                return redirect('/')->withErrors($validator)->withInput();
            } else {
                $email = $request->input('email');
                $password = $request->input('password');

                if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                    return redirect()->intended('/');
                } else {
                    \Session::flash('error','Email or password incorrect');
                    return redirect('/')->withInput()->withErrors('');
                }
            }
        }
        return view('auth.login');
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
            \App\User::create([
               'name' => $data['name'],
               'email' => $data['email'],
               'password' => bcrypt($data['password']),
            ]);
            return view('auth.login');
        }
        return view('auth.register');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
