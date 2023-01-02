<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Classes;
use App\Models\studentClasses;
use Illuminate\Support\Facades\DB;

class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $time_start = '08:00:00';
        $time_end = '18:00:00';
        $timeRange = (new TimeService)->generateTimeRange($time_start, $time_end);

        if(auth()->user()->user_type == 'admin'){
        $lessons = Classes::all();
        }elseif(auth()->user()->user_type == 'lecturer'){
            $lessons = Classes::where('lecturer_id', '=', auth()->user()->id)->get();
        }elseif(auth()->user()->user_type == 'student'){
            $lessons = studentClasses::where('student_id', '=', auth()->user()->id)
            ->rightJoin('classes', 'student_classes.classes_id', 'classes.id')
            ->get();
        }else{
            abort(403, 'Forbidden!');
        }



        // dd($lessons);

        foreach ($timeRange as $time) {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            foreach ($weekDays as $index => $day) {
                $lesson = $lessons->where('weekday', $index)->where('start_time', $time['start'])->first();


                if ($lesson) {
                    $difference = Carbon::parse($lesson->start_time)->diffInMinutes($lesson->end_time);
                // dd($difference);

                    $blockData = DB::table('classes')
                        ->join('units', 'classes.units_id', '=', 'units.id')
                        ->join('users', 'classes.lecturer_id', '=', 'users.id')
                        ->join('units_lists', 'units.units_list_id', '=', 'units_lists.id')->select('users.name as lecturer_name', 'units_lists.name as unit_name', 'units.course', 'units.semester')
                        ->where('classes.lecturer_id', $lesson->lecturer_id)
                        ->where('classes.units_id', $lesson->units_id)
                        ->get();
                        // dd($blockData[0]->unit_name);
                    array_push($calendarData[$timeText], [
                        'lecturer_name' => $blockData[0]->lecturer_name,
                        'unit_name'   => $blockData[0]->unit_name,
                        'course' => $blockData[0]->course,
                        'semester' => $blockData[0]->semester,
                        'rowspan'      => ($difference / 30)
                    ]);
                } else if (!$lessons->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count()) {
                    array_push($calendarData[$timeText], 1);
                } else {
                    array_push($calendarData[$timeText], 0);
                }
            }
        }

        // dd($calendarData);

        return $calendarData;
    }
}
