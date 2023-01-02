<?php

namespace App\Services;

use Carbon\Carbon;

class TimeService
{
    public function generateTimeRange($from, $to)
    {
        $time = Carbon::parse($from);
        $timeRange = [];

        do 
        {
            array_push($timeRange, [
                'start' => $time->format("H:i:s"),
                'end' => $time->addMinutes(30)->format("H:i:s")
            ]);    
        } while ($time->format("H:i:s") !== $to);

        return $timeRange;
    }
}