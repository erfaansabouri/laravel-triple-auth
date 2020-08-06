<?php

namespace App\Http\Controllers;

use App\Advisor;
use App\Branch;
use App\Chart;
use App\College;
use App\Course;
use App\Field;
use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin'); // :guard
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /*ADMIN -> ADVISORS MANAGEMENT*/
    public function advisorsIndex()
    {
        $advisors = Advisor::paginate(20);
        return view('admin.advisor.index' , compact('advisors'));
    }

    public function advisorsCreate()
    {
        $branches = Branch::all();
        return view('admin.advisor.create' , compact('branches'));
    }

    public function advisorsStore(Request $request){
        $validatedData = $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255|unique:advisors,email',
            'branch_id' => 'required|numeric',
            'password' => 'required|min:6',
        ]);

        $advisor = Advisor::create($validatedData);

        return redirect()->route('admin.advisors.index')->with('status', 'استاد مشاور جدید ایجاد شد.');
    }

    public function advisorsEdit($id){
        $advisor = Advisor::findOrFail($id);
        $branches = Branch::all();
        return view('admin.advisor.edit', compact('advisor' , 'branches'));
    }

    public function advisorsUpdate(Request $request , $id){
        $advisor = Advisor::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255',
            'branch_id' => 'required|numeric',
        ];
        if($request->email != $advisor->email){
            $rules = [
                'fname' => 'required|max:255',
                'lname' => 'required|max:255',
                'email' => 'required|max:255|unique:advisors,email',
                'branch_id' => 'required|numeric',
            ];
        }

        if (!isset($request->password)){
            $validatedData = $request->validate($rules , $customMessages);
            $advisor->fname = $request->fname;
            $advisor->lname = $request->lname;
            $advisor->email = $request->email;
            $advisor->save();
            return redirect()->route('admin.advisors.index')->with('status', 'اطلاعات استاد مشاور ویرایش شد.');
        }

        else{
            $password_rule = array('password' => 'required|min:6');
            $rules = array_merge($rules,$password_rule);
            $validatedData = $request->validate($rules,$customMessages);
            $advisor->fname = $request->fname;
            $advisor->lname = $request->lname;
            $advisor->email = $request->email;
            $advisor->password = Hash::make($request->password);
            $advisor->must_set_password = 1;
            $advisor->save();
            return redirect()->route('admin.advisors.index')->with('status', 'اطلاعات استاد مشاور ویرایش شد.');
        }

    }
    /*ADMIN -> COLLEGES MANAGEMENT*/
    public function collegesIndex()
    {
        $colleges = College::paginate(20);
        return view('admin.college.index' , compact('colleges'));
    }

    public function collegesCreate()
    {
        return view('admin.college.create');
    }

    public function collegesStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        College::create($validatedData);

        return redirect()->route('admin.colleges.index')->with('status', 'دانشکده جدید ایجاد شد.');
    }

    public function collegesEdit($id){
        $college = College::findOrFail($id);
        return view('admin.college.edit', compact('college'));
    }

    public function collegesUpdate(Request $request , $id){
        $college = College::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'name' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules , $customMessages);
        $college->name = $request->name;
        $college->save();
        return redirect()->route('admin.colleges.index')->with('status', 'اطلاعات دانشکده ویرایش شد.');
    }
    /*ADMIN -> FIELDS MANAGEMENT*/
    public function fieldsIndex()
    {
        $fields = Field::paginate(20);
        return view('admin.field.index' , compact('fields'));
    }

    public function fieldsCreate()
    {
        $colleges = College::all();
        return view('admin.field.create' , compact('colleges'));
    }

    public function fieldsStore(Request $request){


        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'college_id' =>'required|numeric'
        ]);

        $field = new Field;
        $field->name = $request->name;
        $field->college_id = $request->college_id;
        $field->save();

        return redirect()->route('admin.fields.index')->with('status', 'دانشکده جدید ایجاد شد.');
    }

    public function fieldsEdit($id){
        $field = Field::findOrFail($id);
        $colleges = College::all();
        return view('admin.field.edit', compact('field' , 'colleges'));
    }

    public function fieldsUpdate(Request $request , $id){
        $field = Field::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'name' => 'required|max:255',
            'college_id' => 'required|numeric',
        ];
        $validatedData = $request->validate($rules , $customMessages);
        $field->name = $request->name;
        $field->college_id = $request->college_id;
        $field->save();
        return redirect()->route('admin.fields.index')->with('status', 'اطلاعات رشته ویرایش شد.');
    }
    /*ADMIN -> BRANCHES MANAGEMENT*/
    public function branchesIndex()
    {
        $branches = Branch::paginate(20);
        return view('admin.branch.index' , compact('branches'));
    }

    public function branchesCreate(){
        $fields = Field::all();
        return view('admin.branch.create' , compact('fields'));
    }

    public function branchesStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'field_id' =>'required|numeric'
        ]);

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->field_id = $request->field_id;
        $branch->save();

        return redirect()->route('admin.branches.index')->with('status', 'گرایش جدید ایجاد شد.');
    }

    public function branchesEdit($id){
        $branch = Branch::findOrFail($id);
        $fields = Field::all();
        return view('admin.branch.edit', compact('branch' , 'fields'));
    }

    public function branchesUpdate(Request $request , $id){
        $branch = Branch::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'name' => 'required|max:255',
            'field_id' => 'required|numeric',
        ];
        $validatedData = $request->validate($rules , $customMessages);
        $branch->name = $request->name;
        $branch->field_id = $request->field_id;
        $branch->save();
        return redirect()->route('admin.branches.index')->with('status', 'اطلاعات گرایش ویرایش شد.');
    }
    /*ADMIN -> charts MANAGEMENT*/
    public function chartsIndex()
    {
        $charts = Chart::all();
        return view('admin.chart.index' , compact('charts'));

    }

    public function chartsCreate(){
        $branches = Branch::all();
        return view('admin.chart.create' , compact('branches'));
    }

    public function chartsStore(Request $request){

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'designer' => 'required|max:255',
            'branch_id' =>'required|numeric'
        ]);

        $chart = new Chart();
        $chart->title = $request->title;
        $chart->designer = $request->designer;
        $chart->branch_id = $request->branch_id;
        $chart->save();

        return redirect()->route('admin.charts.index')->with('status', 'چارت جدید ایجاد شد.');

    }

    public function chartsEdit($id){
        $chart = Chart::findOrFail($id);
        $branches = Branch::all();
        return view('admin.chart.edit', compact('chart' , 'branches'));
    }

    public function chartsUpdate(Request $request , $id){
        $chart = Chart::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'title' => 'required|max:255',
            'designer' => 'required|max:255',
            'branch_id' =>'required|numeric'
        ];
        $validatedData = $request->validate($rules , $customMessages);
        $chart->title = $request->title;
        $chart->designer = $request->designer;
        $chart->branch_id = $request->branch_id;
        $chart->save();
        return redirect()->route('admin.charts.index')->with('status', 'اطلاعات چارت ویرایش شد.');

    }

    public function chartsDestroy($id){

        $chart = Chart::find($id);
        $chart->semesters()->delete();
        $chart->delete();
        return redirect()->route('admin.charts.index')->with('status', 'چارت با موفقیت حذف شد.');

    }
    /*ADMIN -> semesters MANAGEMENT*/
    public function semestersIndex()
    {
        $charts = Chart::all();
        $semesters = Semester::all();
        return view('admin.semester.index' , compact('semesters' , 'charts'));
    }

    public function semestersCreate(){

        $charts = Chart::all();
        return view('admin.semester.create' , compact( 'charts'));
    }

    public function semestersStore(Request $request){
        //dd($request->courses);

        $validatedData = $request->validate([
            'priority' => 'required|numeric',
            'chart_id' =>'required|numeric'
        ]);

        $semester = new Semester();
        $semester->priority = $request->priority;
        $semester->chart_id = $request->chart_id;
        $semester->save();

        return redirect()->route('admin.semesters.index')->with('status', 'نیم سال جدید ایجاد شد.');


    }

    public function semestersEdit($id){
        $courses = Course::all();
        $semester = Semester::findOrFail($id);
        $charts = Chart::all();
        return view('admin.semester.edit', compact('courses','semester' , 'charts'));
    }

    public function semestersUpdate(Request $request , $id){
        $semester = Semester::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'priority' => 'required|numeric',
            'chart_id' =>'required|numeric'
        ];
        $validatedData = $request->validate($rules , $customMessages);
        $semester->priority = $request->priority;
        $semester->chart_id = $request->chart_id;
        $semester->courses()->detach();
        $semester->courses()->sync($request->courses);
        $semester->save();
        return redirect()->route('admin.semesters.index')->with('status', 'اطلاعات نیمسال ویرایش شد.');

    }

    public function semestersDestroy($id){

        $semester = Semester::find($id);
        $semester->courses()->detach();
        $semester->delete();
        return redirect()->route('admin.semesters.index')->with('status', 'نیم سال با موفقیت حذف شد.');

    }
    /*ADMIN -> courses MANAGEMENT*/
    public function coursesIndex()
    {
        $courses = Course::all();
        return view('admin.course.index' , compact('courses'));
    }

    public function coursesCreate(){
        $semesters = Semester::all();
        return view('admin.course.create' , compact('semesters'));
    }

    public function coursesStore(Request $request){

        $validatedData = $request->validate([
            'title' => 'required',
            'sess_id' => 'required|numeric',
            'credit' => 'required|numeric',
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->sess_id = $request->sess_id;
        $course->credit = $request->credit;
        $course->save();

        return redirect()->route('admin.courses.index')->with('status', 'درس جدید تعریف شد.');

    }

    public function coursesEdit($id){
        $course = Course::findOrFail($id);
        $prereqs = Course::all();
        $semesters = Semester::all();
        return view('admin.course.edit', compact('course' ,'prereqs', 'semesters'));
    }

    public function coursesUpdate(Request $request , $id){

        //dd($request);
        $course = Course::findOrFail($id);
        $customMessages = [
            'required' => 'فیلد :attribute اجباری است.'
        ];
        $rules = [
            'title' => 'required',
            'sess_id' => 'required|numeric',
            'credit' => 'required|numeric',
        ];
        $validatedData = $request->validate($rules , $customMessages);
        $course->title = $request->title;
        $course->sess_id = $request->sess_id;
        $course->credit = $request->credit;
        $course->prereqs()->detach();
        $course->prereqs()->sync($request->prereqs);
        $course->save();
        return redirect()->route('admin.courses.index')->with('status', 'اطلاعات نیمسال ویرایش شد.');

    }
}
