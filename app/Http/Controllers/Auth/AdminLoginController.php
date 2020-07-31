<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.login');
    }

    public function login(Request $request){
        //validate the form data

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password],$request->remember)){
            // on success redirect to indetended location

            return redirect()->intended(route('admin.dashboard'));
        }


        // on false redirect to login form with data
        return redirect()->back()->withInput($request->only('email' , 'remember'))->with('error', 'نام کاربری یا رمز عبور اشتباه است.');
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function showAdminResetPassword(){
        return view('admin.reset-password');
    }

    public function adminReplaceNewPassword(Request $request){
        $user = Auth::guard('admin')->user();
        $this->validate($request,[
            'password' => 'required|min:6'
        ]);
        $user->password = Hash::make($request['password']);
        $user->must_set_password = 0;
        $user->save();
        return redirect()->route('admin.dashboard');
    }
}
