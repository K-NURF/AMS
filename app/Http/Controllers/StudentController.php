<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\studentClasses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\Units;
use Illuminate\Support\Facades\DB;
use App\Models\Announcements;
use App\Models\graduationList;

class StudentController extends Controller
{
    public function student() {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        return view('student.dashboard');
    }

    public function apply(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => 'required',
            'country' => 'required',
            'course' => 'required',
            'user_type' => 'required',
            'DOB' => 'required',
            'status' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $applicant = User::create($data);

        return redirect('/')->with('message', 'Appllication sent successfully');
    }
    public function displayAllUnits()
    {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        $availableUnits = DB::table('classes')
            ->join('units', 'classes.units_id', 'units.id')
            ->join('units_lists', 'units.units_list_id', '=', 'units_lists.id')
            ->where('units.course', auth()->user()->course)
            ->where('units.semester', auth()->user()->semester)
            ->select('units.semester', 'units.course', 'units_lists.name', 'classes.id as class_id')
            ->get();
        return view('student.units.availableunits', ['units' => $availableUnits]);
    }

    public function register_unit(Classes $class_id)
    {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        $data = ['classes_id' => $class_id['id'], 'student_id' => auth()->user()->id];
        studentClasses::firstOrCreate($data);

        return redirect('/availableunits')->with('message', 'Registration successful');
    }
    public function post_grades(Classes $class_id)
    {
        $data = ['classes_id' => $class_id['id'], 'student_id' => auth()->user()->id];
        studentClasses::create($data);

        return redirect('/availableunits')->with('message', 'Registration successful');
    }



    public function displayRegUnits()
    {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        $registeredUnits = DB::table('student_classes')
            ->join('classes', 'student_classes.classes_id', 'classes.id')
            ->join('units', 'classes.units_id', 'units.id')
            ->join('units_lists', 'units.units_list_id', 'units_lists.id')
            ->where('student_classes.student_id', auth()->user()->id)
            ->select('units_lists.name', 'units.course', 'units.semester')
            ->get();



        return view('student.units.registeredunits', ['units' => $registeredUnits]);
    }

    public function displayGrades()
    {
        return view('student.report.grades');
    }
    public function displayProgress()
    {
        return view('student.report.progress');
    }


    public function displayAnnouncements()
    {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        $announcements = Announcements::where('recepient', 'student')->orWhere('recepient', 'all')->get();

        // dd($announcements);

        return view('student.announcements', ['announcements' => $announcements]);
    }

    public function regGrad(Request $request)
    {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        $data = $request->validate([
            'student_id' => 'required',
            'status' => 'required',

        ]);

        // dd($data);

        $graduant = graduationList::create($data);
        return redirect('/students')->with('message', 'Registration Sent successfully');
    }

   

    public function graduants()
    {
        if (auth()->user()->user_type != 'student') {
            abort(403, 'Forbidden!!!');
        }
        $gradApplicants = DB::table('graduation_lists')
            ->join('users', 'graduation_lists.student_id', 'users.id')
            ->where('graduation_lists.status','0')
            ->select('users.id','users.name','users.course')
            ->get();

        return view('admin.students.graduants', ['gradApplicants' => $gradApplicants]);
    }

    public function addstudent(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => 'required',
            'country' => 'required',
            'religion' => 'required',
            'semester' => 'required',
            'course' => 'required',
            'user_type' => 'required',
            'DOB' => 'required',
            'high_school' => 'required',
            'status' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $student = User::create($data);
        return redirect('/admin')->with('message', 'Student registered succesfully'); 
    }
}
