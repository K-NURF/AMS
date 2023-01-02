<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

use App\Models\User;
use App\Models\Units;
use App\Models\Classes;
use App\Models\unitsLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use App\Models\Announcements;
use App\Models\Staff;
use App\Models\graduationList;

class AdminController extends Controller
{
    public function admin()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        return view('admin.dashboard');
    }
    public function applicants()
    {
        $list = User::where('user_type', 'applicant')->get();
        return view('admin.students.applicants', ['applicants' => $list]);
    }

    //decline applicant
    public function decline(User $applicant)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }

        $applicant->delete();
        return redirect('/applicants')->with('message', 'Applicant denied');
    }
    
        //accept applicant
        public function accept(Request $request, User $applicant)
        {
            if (auth()->user()->user_type != 'admin') {
                abort(403, 'Forbidden!!!');
            }
            $data = $request->validate([
                'user_type' => 'required',
                'status' => 'required',
                
            ]);
            $data['applicant'] = auth()->user()->id;
    
            $applicant->update($data);
    
            return redirect('/applicants')->with('message', 'Applicant Accepted');

        }
   
    public function all_students()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $list = User::where('user_type', 'student')->get();
        return view('admin.students.all', ['students' => $list]);
    }

    public function create_class()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $units = unitsLists::all();
        return view('admin.class.create', ['units' => $units]);
    }
    public function store_class(Request $request)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $data = $request->validate([
            'units_list_id' => 'required',
            'course' => 'required',
            'semester' => 'required',
            

        ]);

        $unit = Units::create($data);

        $unitId = $data['units_list_id'];

        $school = DB::table('units_lists')->select('school_id')->where('id', $unitId)->pluck('school_id');


        $unit_id = $unit['id'];

        $lecturers = DB::table('lecturers')->where('school_id', $school)
            ->join('users', 'lecturers.lecturer_id', '=', 'users.id')->select('users.id', 'users.name')
            ->get();

        return view('admin.class.create2', ['lecturers' => $lecturers, 'unit_id' => $unit_id]);
    }

    public function store_classroom(Request $request)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }

        $class = $request->validate([
            'lecturer_id' => 'required',
            'units_id' => 'required',
            'weekday' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // return $class    ;

        Classes::create($class);


        return redirect('/admin')->with('message', 'Class created successfully');
    }

    public function store_staffApplications(Request $request)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => 'required',
            'country' => 'required',
            'department' => 'required',
            'user_type' => 'required',
            'DOB' => 'required',
            'status' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $applicant = User::create($data);

        return redirect('/')->with('message', 'Application sent successfully');
    }

    public function staffapplicants()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $list = User::where('user_type', 'staffApplicant')->get();
        return view('admin.staff.applicants', ['applicants' => $list]);
    }

    

    public function staff()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $staff = DB::table('staff')
            ->join('users', 'staff.staff_id', 'users.id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone_number', 'users.country', 'users.religion', 'users.dob', 'staff.department')
            ->get();



        return view('admin.staff.all', ['staff' => $staff]);
    }

    public function addstaff(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => 'required',
            'country' => 'required',
            'religion' => 'required',
            'user_type' => 'required',
            'DOB' => 'required',
            'status' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $staff = User::create($data);
        return redirect('/admin')->with('message', 'Staff registered succesfully'); 
    }

    public function showunits()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $units = DB::table('classes')
            ->join('units', 'classes.units_id', '=', 'units.id')
            ->join('users', 'classes.lecturer_id', '=', 'users.id')
            ->join('units_lists', 'units.units_list_id', '=', 'units_lists.id')
            ->select('users.name as lecturer_name', 'units_lists.name as unit_name', 'classes.available', 'units.course', 'units.semester')
            ->get();

        return view('admin.class.all', ['units' => $units]);
    }

    public function checkAcceptance(Request $request)
    {

        $data = $request->validate([

            'email' => ['required'],
        ]);

        $email = $data['email'];

        if (DB::table('users')->where('users.email', $data['email'])->exists()) {

            if (DB::table('users')->where('users.email', $data['email'])
                ->where('users.user_type', 'student')
                ->where('users.status', '0')
                ->exists()
            ) {
                $names = DB::table('users')
                    ->where('users.email', $data['email'])
                    ->select('users.name', 'users.id')
                    ->get();

                // return $names;

                return view('guests.acceptanceletter', ['names' => $names]);
            }
        } else {
            return redirect('/')->with('message', 'Application not Found');
        }
    }

    public function appliedGrad()
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }
        $gradApplicants = DB::table('graduation_lists')
            ->join('users', 'graduation_lists.student_id', 'users.id')
            ->where('graduation_lists.status', '1')
            ->select('users.id', 'users.name', 'users.course', 'graduation_lists.id as graduation_id')
            ->get();
        //$graduationapplicants = graduationlist::all();
        return view('admin.students.gradApplicants', ['gradApplicants' => $gradApplicants]);
    }

    public function declineGrad(graduationList $graduationapplicant)
    {
        $graduationapplicant->delete();
        return redirect('/appliedGrad')->with('message', 'Graduation Applicant denied');
    }

    public function acceptGrad(Request $request, graduationList $graduationapplicant)
    {

        $data = $request->validate([
            'status' => 'required',
        ]);

        //$grad=graduationList::where('student_id', $gradApplicant['student_id']);
        $graduationapplicant->update($data);
        return redirect('/appliedGrad')->with('message', 'Graduation Applicant Accepted');
    }

    public function complete_registration(Request $request, User $student){
        $data = $request->validate([
            'religion' => 'required',
            'high_school' => 'required',
            'DOB' => 'required',
            'semester' => 'required',
        ]);
        // dd($data);
        $student->update($data);

        return redirect('/login');

    }

    //declinestaffapplicant
    public function declinestaff(User $applicant)
    {
        if (auth()->user()->user_type != 'admin') {
            abort(403, 'Forbidden!!!');
        }

        $applicant->delete();
        return redirect('/applicants')->with('message', 'Staff applicant denied');
    }

        //accept staffapplicant
        public function acceptstaff(Request $request, User $applicant)
        {
            if (auth()->user()->user_type != 'admin') {
                abort(403, 'Forbidden!!!');
            }
            $data = $request->validate([
                'user_type' => 'required',    
                'status' => 'required',
                //'semester' => 'required'
            ]);
            $data['applicant'] = auth()->user()->id;
    
            $applicant->update($data);
    
            return redirect('/applicants')->with('message', 'Staff Applicant Accepted');

        }
}
