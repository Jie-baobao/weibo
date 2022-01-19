<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    //仅未登录用户访问登录页面
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function store(Request $request)
    {
       $credentials = $this->validate($request, [
           'email' => 'required|email|min:3|max:255',
           'password' => 'required'
       ]);

       //登录成功访问上一请求或用户页
       if (Auth::attempt($credentials, $request->has('remember'))) {
        session()->flash('success', '欢迎回来！');
        $fallback = route('users.show', Auth::user());
        return redirect()->intended($fallback);
    } else {
        //登录失败返回登录页
        session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
        return redirect()->back()->withInput();
    }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
