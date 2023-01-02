<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;

class AnnouncementsController extends Controller
{
    public function announce(){
        return view('admin.announce');
    }
    public function store_announcement(Request $request){

        

        $data = $request->validate([
            'recepient' => ['required', 'string', 'max:255'],
            'message' => 'required',
                        
        ]);

        // dd($data);


        Announcements::create($data);

        return redirect('/admin')->with('message', 'Announcement sent successfully');

    }

    public function displayAnnouncements(){
        $announcement = Announcements::all();
        
        return view('admin.announcements', ['announcements' => $announcement]);

    }

    public function deleteAnnouncement(Announcements $announcement_id){

        $announcement_id->delete();
        return redirect('/view_announcements')->with('message', 'Announcement deleted');
        

    }

    public function staffAnnounce(){
        return view('admin.staffAnnounce');
    }

    public function store_staffannouncement(Request $request){

        

        $data = $request->validate([
            'recepient' => ['required', 'string', 'max:255'],
            'message' => 'required',
                        
        ]);

        // dd($data);


        Announcements::create($data);

        return redirect('/admin')->with('message', 'Announcement sent successfully');

    }
}

