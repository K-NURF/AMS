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
        ]);

        $applicant = User::create($data);


    }
}
