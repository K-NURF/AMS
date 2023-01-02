<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function applicants(){
        $list = User::where('user_type', 'applicant')->get();
        return view('admin.students.applicants', ['applicants' => $list]);
    }

    public function all_students(){
        $list = User::where('user_type', 'student')->get();
        return view('admin.students.all', ['students' => $list]);
    }
}
