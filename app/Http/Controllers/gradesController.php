<?php

namespace App\Http\Controllers;

use App\Models\grades;
use Illuminate\Http\Request;

class gradesController extends Controller
{
    public function store_grades(Request $request){

        

        $data = $request->validate([
            'student_id' => 'required',
            'grade' => 'required',
                        
        ]);

         dd($data);


        //grades::create($data);

        return redirect('/admin')->with('message', 'Announcement sent successfully');

    }

}