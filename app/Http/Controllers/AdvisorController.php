<?php

namespace App\Http\Controllers;

use App\Advisor;
use App\Branch;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdvisorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:advisor'); // :guard
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('advisor.dashboard');
    }

    public function studentsIndex(){
        $advisor = Auth::guard('advisor')->user();

        $students = $advisor->students;
        //dd($students);
        return view('advisor.student.index' , compact('students'));
    }

    public function studentsCreate(){
        $branches = Branch::all();
        return view('advisor.student.create' , compact('branches'));
    }

    public function studentsStore(Request $request){
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $validatedData = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255|unique:students,email',
            'entry_year' => 'required|numeric',
            'student_code' => 'required|numeric',
            'branch_id' => 'required|numeric',
            'password' => 'required|min:6',
        ],$customMessages);
        $student = new Student;
        $student->advisor_id = Auth::guard('advisor')->user()->id;
        $student->fname=$request->fname;
        $student->lname=$request->lname;
        $student->email=$request->email;
        $student->entry_year=$request->entry_year;
        $student->student_code=$request->student_code;
        $student->branch_id=$request->branch_id;
        $student->password=Hash::make($request->password);
        $student->save();

        return redirect()->route('advisor.students.index')->with('status', 'دانشجوی جدید ایجاد شد.');
    }

    public function studentsEdit($id){
        $branches = Branch::all();
        $student = Student::findOrFail($id);
        return view('advisor.student.edit', compact('student','branches'));
    }


    public function studentsUpdate(Request $request , $id){
        $student = Student::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255',
            'entry_year' => 'required|numeric',
            'student_code' => 'required|numeric',
            'branch_id' => 'required|numeric',

        ];
        if($request->email != $student->email){
            $rules = [
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'email' => 'required|max:255|unique:students,email',
                'entry_year' => 'required|numeric',
                'student_code' => 'required|numeric',
                'branch_id' => 'required|numeric',

            ];
        }

        if (!isset($request->password)){
            $validatedData = $request->validate($rules , $customMessages);
            $student->fname = $request->fname;
            $student->lname = $request->lname;
            $student->email = $request->email;
            $student->entry_year = $request->entry_year;
            $student->student_code = $request->student_code;
            $student->branch_id = $request->branch_id;
            $student->advisor_id = Auth::guard('advisor')->user()->id;
            $student->save();
            return redirect()->route('advisor.students.index')->with('status', 'اطلاعات دانشجو ویرایش شد.');
        }

        else{
            $password_rule = array('password' => 'required|min:6');
            $rules = array_merge($rules,$password_rule);
            $validatedData = $request->validate($rules,$customMessages);
            $student->fname = $request->fname;
            $student->lname = $request->lname;
            $student->email = $request->email;
            $student->entry_year = $request->entry_year;
            $student->student_code = $request->student_code;
            $student->branch_id = $request->branch_id;
            $student->advisor_id = Auth::guard('advisor')->user()->id;
            $student->save();
            return redirect()->route('advisor.students.index')->with('status', 'اطلاعات دانشجو ویرایش شد.');
        }

    }


}
