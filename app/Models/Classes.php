<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'lecturer_id',
        'units_id',
        'weekday',
        'start_time',
        'end_time',
        'available',
    ];

    const WEEK_DAYS = [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function units(){
        return $this->belongsTo(Units::class, 'units_id');
    }

    public function studentClasses(){
        return $this->hasMany(studentClasses::class, 'studentClasses_id');
    }
}
