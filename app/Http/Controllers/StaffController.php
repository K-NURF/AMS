<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function staff(){
        if (auth()->user()->user_type == 'staff') {
            abort(403, 'Forbidden!!!');
        }
        return view('admin.dashboard');
    }
    public function displayAnnouncements()
    {

        $announcements = Announcements::where('recepient', 'staff')->orWhere('recepient', 'all')->get();

        // dd($announcements);

        return view('staff.announcements', ['announcements' => $announcements]);
    }
    public function displayDeptAnnouncements()
    {
        $departments = DB::table('staff')
            ->where('staff.staff_id', auth()->user()->id)
            ->pluck('staff.department');

        //    dd($departments);


        $announcements = Announcements::where('recepient', $departments)->get();

        return view('staff.deptannouncements', ['announcements' => $announcements]);

       
    }

    
}
