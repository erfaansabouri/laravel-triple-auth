<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentLoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.student-login');
    }

    public function login(Request $request){
        //validate the form data

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // attempt to log the user in
        if(Auth::guard('student')->attempt(['email' => $request->email , 'password' => $request->password],$request->remember)){
            // on success redirect to indetended location

            return redirect()->intended(route('student.dashboard'));
        }


        // on false redirect to login form with data
        return redirect()->back()->withInput($request->only('email' , 'remember'));
    }

    public function logout(){
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function showStudentResetPassword(){
        return view('auth.student-reset-password');
    }

    public function studentReplaceNewPassword(Request $request){
        $user = Auth::guard('student')->user();
        $this->validate($request,[
            'password' => 'required|min:6'
        ]);
        $user->password = Hash::make($request['password']);
        $user->must_set_password = 0;
        $user->save();
        return redirect()->route('student.dashboard');
    }
}
