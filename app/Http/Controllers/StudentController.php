<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function apply(Request $request) 
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => 'required',
            'country' => 'required',
            'course' => 'required',
            'user_type' => 'required',
        ]);

        $applicant = User::create($data);


    }
    public function displayAllUnits(){
        return view('student.units.availableunits');
    }
    public function displayRegUnits(){
        return view('student.units.registeredunits');
    }
    public function displayGrades(){
        return view('student.report.grades');
    }
    public function displayProgress(){
        return view('student.report.progress');
    }
    
}
