<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

     public function index()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
       //dd($request->email);
        $email=$request->email;

        $password=$request->password;

        if(Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password])) {
                return redirect()->intended(route('admin.login'));

        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}

