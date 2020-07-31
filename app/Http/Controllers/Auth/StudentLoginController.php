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
        return view('student.login');
    }

    public function login(Request $request){
        //validate the form data

        $this->validate($request,[
            'student_code' => 'required',
            'password' => 'required|min:6'
        ]);

        // attempt to log the user in
        if(Auth::guard('student')->attempt(['student_code' => $request->student_code , 'password' => $request->password],$request->remember)){
            // on success redirect to indetended location

            return redirect()->intended(route('student.dashboard'));
        }


        // on false redirect to login form with data
        return redirect()->back()->withInput($request->only('student_code' , 'remember'))->with('error', 'نام کاربری یا رمز عبور اشتباه است.');
    }

    public function logout(){
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function showStudentResetPassword(){
        return view('student.reset-password');
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
