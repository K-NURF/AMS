<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\grades;
use App\Models\Classes;
use App\Models\courses;
use App\Models\Lecturer;
use App\Models\attendance;
use App\Models\coursework;
use App\Models\classSession;
use Illuminate\Http\Request;
use App\Models\Announcements;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;


class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lecturer(){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        return view('lecturers.dashboard');

    }

    public function displayAnnouncements()
    {
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $announcements = Announcements::where('recepient', 'lecturer')->orWhere('recepient', 'all')->get();

        // dd($announcements);

        return view('lecturers.announcements', ['announcements' => $announcements]);
    }

    public function displayClasses()
    {
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $classes = DB::table('classes')

            ->join('units', 'classes.units_id', 'units.id')
            ->join('units_lists', 'units.units_list_id', 'units_lists.id')
            ->where('classes.lecturer_id', auth()->user()->id)
            ->select('classes.weekday', 'classes.start_time', 'classes.end_time', 'units_lists.name', 'classes.id')
            ->get();
        // dd($my_classes);
        return view('lecturers.my_classes', ['classes' => $classes]);
    }

    public function create_session(Classes $class_id)
    {
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        return view('lecturers.create_session', ['classes' => $class_id]);
    }
    public function process_session(Request $request)
    {
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $class = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'classes_id' => 'required',
            'date' => 'required',
        ]);

        $session = classSession::create($class);

        $students = DB::table('student_classes')
        ->where('classes_id', $class['classes_id'])
        ->get();

        for($i = 0; $i < $students->count(); $i++){
        $attendance = ['class_session_id' => $session->id, 'student_id' => $students[$i]->student_id];
            attendance::create($attendance);
        }

        session(['class_session' => $session->id]);


        return redirect('/mark_students');
    }
//display all students for attendance
    public function mark_students(){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $class_session = session('class_session');

        $mark_students = DB::table('attendances')
        ->join('users', 'attendances.student_id', 'users.id')
        ->where('attendances.class_session_id', $class_session)
        ->select('users.name as student_name', 'attendances.student_id','attendances.attendance', 'attendances.id')
        ->get();

        return view('lecturers.mark_attendance', ['students' => $mark_students]);

    }
    //display all students for grading
    public function postgrades(){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $class_session = session('class_session');

        $mark_students = DB::table('attendances')
        ->join('users', 'attendances.student_id', 'users.id')
        ->where('attendances.class_session_id', $class_session)
        ->select('users.name as student_name', 'attendances.student_id','attendances.attendance', 'attendances.id')
        ->get();

        return view('lecturers.post_grades', ['students' => $mark_students]);

    }
    public function store_grades(Request $request){

        for($x =0;$x<20;$x++){

        $data = $request->validate([
            'student_id' => 'required',
            'grade' => 'required',
                        
        ]);

        dd($data);
    }

        //grades::create($data);

        //return redirect('/my_classes')->with('message', 'grade posted successfully');

    }

    //mark as present
   
    public function mark_present(attendance $attendance_id){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        DB::table('attendances')->where('id', $attendance_id->id)->update(['attendance' => 0]);
        return redirect('/mark_students')->with('message', 'Attendance updated successfully');
    }
    //mark as absent
    public function mark_absent(attendance $attendance_id){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        DB::table('attendances')->where('id', $attendance_id->id)->update(['attendance' => 1]);
        return redirect('/mark_students')->with('message', 'Attendance updated successfully');
    }
    //update as present
    public function update_present(attendance $attendance_id){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        DB::table('attendances')->where('id', $attendance_id->id)->update(['attendance' => 0]);
        $session_id = session()->pull('updated_session_id');
        return redirect("/edit_attendance/$session_id")->with('message', 'Attendance updated successfully');
    }
    //update as absent
    public function update_absent(attendance $attendance_id){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        DB::table('attendances')->where('id', $attendance_id->id)->update(['attendance' => 1]);
        $session_id = session()->pull('updated_session_id');
        return redirect("/edit_attendance/$session_id")->with('message', 'Attendance updated successfully');
    }

    public function past_classes(){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $sessions = DB::table('class_sessions')
        ->join('classes', 'class_sessions.classes_id', 'classes.id')
        ->join('units', 'classes.units_id', 'units.id')
        ->join('units_lists', 'units.units_list_id', 'units_lists.id')
        ->where('classes.lecturer_id', auth()->user()->id)
        ->select('class_sessions.id as session_id', 'units_lists.name', 'class_sessions.date', 'class_sessions.start_time', 'class_sessions.end_time', 'units.course', 'units.semester')
        ->orderBy('class_sessions.date', 'desc')
        ->get();

        return view('lecturers.past_classes', ['sessions' => $sessions]);

    }

    public function edit_attendance(classSession $session_id){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $mark_students = DB::table('attendances')
        ->join('users', 'attendances.student_id', 'users.id')
        ->where('attendances.class_session_id', $session_id->id)
        ->select('users.name as student_name', 'attendances.student_id','attendances.attendance', 'attendances.id')
        ->get();

        session(['updated_session_id' => $session_id->id]);

        return view('lecturers.edit_attendance', ['students' => $mark_students, 'session' => $session_id]);
    }


    public function processcoursework(Request $request){
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        $coursework = $request->validate([
            'classes_id' => 'required',
            'topic' => ['required', 'string', 'max:255'],
            
            
        ]);
if($request->hasFile('file')){
$coursework['file']=$request->file('file')->store('materials','public');

}
        // dd($coursework);


        Coursework::create($coursework);

        return redirect('/lecturer')->with('message', 'Coursework sent successfully');

    
    }

    public function create_coursework(Classes $classes_id)
    {
        
        if (auth()->user()->user_type != 'lecturer') {
            abort(403, 'Forbidden!!!');
        }
        return view('lecturers.add_coursework', ['classes_id' => $classes_id]);
    }

    public function addlecturer(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => 'required',
            'country' => 'required',
            'religion' => 'required',
            'user_type' => 'required',
            'DOB' => 'required',
            'school' => 'required',
            'status' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $lecturer = User::create($data);

        $details = ['lecturer_id' => $lecturer->id, 'school_id' => $data['school']];

        Lecturer::create($details);
        
        return redirect('/admin')->with('message', 'Lecturer registered succesfully'); 
    }
    
}
